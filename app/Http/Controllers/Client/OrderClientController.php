<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\City;
use App\Models\CustomerVoucher;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVoucher;
use App\Models\Voucher;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrderClientController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Session::get('client_auth');
        // dd($user);
        if (!$user) {
            return redirect()->route('client.login.form')
                ->with('error', 'Vui lòng đăng nhập để thanh toán');
        }

        $selectedItemIds = explode(',', $request->selected_cart_items);

        $cartItems = CartItem::whereIn('id', $selectedItemIds)
            ->whereHas('cart', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->with(['variant.product', 'variant.attribute'])
            ->get();

        // dd($cartItems);
        $sessionCart = [];
        foreach ($cartItems as $item) {
            $sessionCart[] = $item->variant->product->id;
        }
        // dd($sessionCart);

        if ($cartItems->isEmpty()) {
            return redirect()->route('client.cart.show')
                ->with('error', 'Không có sản phẩm nào được chọn');
        }

        $subTotal = $cartItems->sum(function ($item) {
            return $item->variant->price_variant * $item->quantity;
        });

        // Thêm Log để debug
        Log::info('Setting total_price in session: ' . $subTotal);

        $cities = City::all();
        $districts = District::where('city_id', $user->city_id)->get();
        $wards = Ward::where('district_id', $user->district_id)->get();

        // dd($districts, $wards);
        // dd($subTotal);
        Session::put([
            'selected_cart_items' => $selectedItemIds,
            'sessionCart' => $sessionCart,
            'total_price' => $subTotal
        ]);

        // Thêm Log để verify
        Log::info('Verifying total_price in session: ' . Session::get('total_price'));

        return view('frontend.order', compact('cartItems', 'subTotal', 'cities', 'districts', 'wards'));
    }

    public function showOrderSuccess()
    {
        if (!Session::has('order_success')) {
            return redirect()->route('client.home');
        }

        Session::forget('order_success');

        return view('frontend.order-success');
    }

    public function orderProcess(Request $request)
    {

        // dd($request->all());
        try {
            // DB::beginTransaction();

            $user = Session::get('client_auth');
            if (!$user) {
                return redirect()->route('client.login.form')
                    ->with('error', 'Vui lòng đăng nhập để thanh toán');
            }

            // Lấy danh sách item được chọn từ session
            $selectedItemIds = Session::get('selected_cart_items', []);
            if (empty($selectedItemIds)) {
                return redirect()->route('client.cart.show')
                    ->with('error', 'Không có sản phẩm nào được chọn');
            }

            // Lấy các item được chọn
            $cartItems = CartItem::whereIn('id', $selectedItemIds)
                ->with(['variant.product', 'variant.attribute'])
                ->get();
            $discountAmount = Session::get('discount_amount');
            $totalAmount = Session::has('final_price') ? Session::get('final_price') : $cartItems->sum(function ($item) {
                return $item->variant->price_variant * $item->quantity;
            });

            // Tạo đơn hàng
            $order = Order::create([
                'order_code' => 'PNJ' . time() . random_int(10000, 99999),
                'user_id' => $user->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'date' => date('Y-m-d H:i:s'),
                'total_amount'  => $totalAmount,
                'discount_amount'  => $discountAmount,
                'address' => $request->address,
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
                'ward_id' => $request->ward_id,
                'note' => $request->note,
                'payment_method_id' => $request->payment,
                'status_id' => 1,
            ]);

            // Tạo chi tiết đơn hàng
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'variant_id' => $item->variant_id,
                    'unit_price' => $item->variant->price_variant,
                    'quantity' => $item->quantity,
                    'total_price' => $item->variant->price_variant * $item->quantity
                ]);
            }

            if (Session::has('voucher_id')) {
                $voucher = Voucher::find(Session::get('voucher_id'));
                if ($voucher) {
                    $voucher->increment('uses');
                }
            }

            // Xóa các sản phẩm đã đặt khỏi giỏ hàng
            CartItem::whereIn('id', $selectedItemIds)->delete();

            // Xóa session
            Session::forget(['voucher_id', 'voucher_code', 'discount_amount', 'final_price', 'selected_cart_items', 'sessionCart', 'total_price']);
            Session::put('order_success', true);
            return redirect()->route('client.order.success')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi đặt hàng: ');
        }
    }

    public function applyVoucher(Request $request)
    {
        try {
            $voucherCode = $request->voucher_code;
            $totalPrice = Session::get('total_price', 0);
            Log::info('Total Price: ' . $totalPrice);
            if (!$totalPrice) {
                return response()->json(['success' => false, 'message' => 'Lỗi khi áp dụng mã giảm giá.']);
            }

            // Tìm mã giảm giá
            $voucher = Voucher::where('voucher_code', $voucherCode)
                ->where('start_date', '<=', now())
                ->where('end_date', '>=', now())
                ->first();

            if (!$voucher) {
                return response()->json(['success' => false, 'message' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn!']);
            }

            // Kiểm tra số lần sử dụng
            if ($voucher->uses >= $voucher->max_uses) {
                return response()->json(['success' => false, 'message' => 'Mã giảm giá đã hết lượt sử dụng!']);
            }

            // Kiểm tra số lần sử dụng của user
            $userUses = CustomerVoucher::where('voucher_id', $voucher->id)
                ->where('user_id', auth()->id())
                ->count();

            if ($userUses >= $voucher->max_uses_user) {
                return response()->json(['success' => false, 'message' => 'Mã giảm giá đã hết lượt sử dụng!']);
            }

            // Kiểm tra giá trị đơn hàng tối thiểu
            if ($totalPrice < $voucher->min_order_value) {
                return response()->json([
                    'success' => false,
                    'message' => "Đơn hàng phải có giá trị tối thiểu " . formatPrice($voucher->min_order_value) . " mới có thể áp dụng mã!"
                ]);
            }

            if ($voucher->type == 1) {

                $cartProducts = Session::get('sessionCart', []); // Danh sách ID sản phẩm use 

                // Kiểm tra giá trị của $cartProducts
                // Log::info('Dữ liệu cartProducts:', ['cartProducts' => $cartProducts]);

                $validProducts = ProductVoucher::where('voucher_id', $voucher->id)
                    ->whereIn('product_id', $cartProducts)
                    ->exists();

                if (!$validProducts) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Mã giảm giá không phù hợp với sản phẩm của bạn!'
                    ]);
                }
            }

            if ($voucher->type == 2) {
                $validUser = CustomerVoucher::where('voucher_id', $voucher->id)
                    ->where('user_id', auth()->id())
                    ->exists();

                if (!$validUser) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Mã giảm giá không hợp lệ cho tài khoản của bạn!'
                    ]);
                }
            }

            $discountAmount = $voucher->is_fixed ? $voucher->discount_amount : ($voucher->discount_amount / 100) * $totalPrice;
            $finalPrice = max(0, $totalPrice - $discountAmount);

            // Lưu vào session
            Session::put('discount_amount', $discountAmount);
            Session::put('final_price', $finalPrice);
            Session::put('voucher_id', $voucher->id);
            Session::put('voucher_code', $voucher->voucher_code);

            return response()->json([
                'success' => true,
                'voucher_code' => $voucherCode,
                'discount_amount' => formatPrice($discountAmount),
                'final_price' => formatPrice($finalPrice),
                'message' => 'Áp dụng mã giảm giá thành công!'
            ]);

            // return redirect()->back()->with('success', 'Áp dụng mã giảm giá thành công!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Lỗi máy chủ: ' . $e->getMessage()
            ], 500);
        }
    }

    public function removeVoucher()
    {
        try {
            // Xóa các session liên quan đến voucher
            Session::forget(['voucher_id', 'voucher_code', 'discount_amount', 'final_price']);

            // Lấy giá gốc từ session
            $originalPrice = Session::get('total_price', 0);

            return response()->json([
                'success' => true,
                'message' => 'Xõa mã giảm giá thành công!',
                'final_price' => formatPrice($originalPrice)
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi xóa mã giảm giá'
            ], 500);
        }
    }


    // // Xử lý thanh toán VNPay
    // private function processVNPayPayment($order)
    // {
    //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //     $vnp_ReturnUrl = route('client.vnpay.return');
    //     $vnp_TmnCode = "YOUR_TMN_CODE";
    //     $vnp_HashSecret = "YOUR_HASH_SECRET";

    //     $vnp_TxnRef = $order->order_code;
    //     $vnp_OrderInfo = "Thanh toan don hang " . $order->order_code;
    //     $vnp_OrderType = "billpayment";
    //     $vnp_Amount = $order->total_amount * 100;
    //     $vnp_Locale = 'vn';
    //     $vnp_IpAddr = request()->ip();

    //     $inputData = array(
    //         "vnp_Version" => "2.1.0",
    //         "vnp_TmnCode" => $vnp_TmnCode,
    //         "vnp_Amount" => $vnp_Amount,
    //         "vnp_Command" => "pay",
    //         "vnp_CreateDate" => date('YmdHis'),
    //         "vnp_CurrCode" => "VND",
    //         "vnp_IpAddr" => $vnp_IpAddr,
    //         "vnp_Locale" => $vnp_Locale,
    //         "vnp_OrderInfo" => $vnp_OrderInfo,
    //         "vnp_OrderType" => $vnp_OrderType,
    //         "vnp_ReturnUrl" => $vnp_ReturnUrl,
    //         "vnp_TxnRef" => $vnp_TxnRef,
    //     );

    //     ksort($inputData);
    //     $query = "";
    //     $i = 0;
    //     $hashdata = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashdata .= urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
    //     }

    //     $vnp_Url = $vnp_Url . "?" . $query;
    //     if (isset($vnp_HashSecret)) {
    //         $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    //     }

    //     return redirect($vnp_Url);
    // }

    // // Xử lý kết quả trả về từ VNPay
    // public function vnpayReturn(Request $request)
    // {
    //     if ($request->vnp_ResponseCode == '00') {
    //         $order = Order::where('order_code', $request->vnp_TxnRef)->firstOrFail();
    //         $order->update(['status' => 'paid']);

    //         return redirect()->route('client.order.success', $order->id)
    //             ->with('success', 'Thanh toán thành công');
    //     }

    //     return redirect()->route('client.order.failed')
    //         ->with('error', 'Thanh toán thất bại');
    // }
}
