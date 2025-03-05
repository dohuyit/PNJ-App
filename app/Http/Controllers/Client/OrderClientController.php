<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderClientController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        // dd($user);
        if (!$user) {
            return redirect()->route('client.login.form')
                ->with('error', 'Vui lòng đăng nhập để thanh toán');
        }

        $selectedItemIds = explode(',', $request->selected_cart_items);

        // dd($selectedItemIds);
        $cartItems = CartItem::whereIn('id', $selectedItemIds)
            ->whereHas('cart', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->with(['variant.product', 'variant.attribute'])
            ->get();

        // dd($cartItems);

        if ($cartItems->isEmpty()) {
            return redirect()->route('client.cart.show')
                ->with('error', 'Không có sản phẩm nào được chọn');
        }

        $subTotal = $cartItems->sum(function ($item) {
            return $item->variant->price_variant * $item->quantity;
        });

        $cities = City::all();
        $districts = District::where('city_id', $user->city_id)->get();
        $wards = Ward::where('district_id', $user->district_id)->get();

        // dd($districts, $wards);
        // dd($subTotal);
        session(['selected_cart_items' => $selectedItemIds]);

        return view('frontend.order', compact('cartItems', 'subTotal', 'cities', 'districts', 'wards'));
    }

    public function showOrderSuccess()
    {
        if (!session()->has('order_success')) {
            return redirect()->route('client.home');
        }

        session()->forget('order_success');

        return view('frontend.order-success');
    }

    public function orderProcess(Request $request)
    {

        // dd($request->all());
        try {
            // DB::beginTransaction();

            $user = Auth::user();
            if (!$user) {
                return redirect()->route('client.login.form')
                    ->with('error', 'Vui lòng đăng nhập để thanh toán');
            }

            // Lấy danh sách item được chọn từ session
            $selectedItemIds = session('selected_cart_items', []);
            if (empty($selectedItemIds)) {
                return redirect()->route('client.cart.show')
                    ->with('error', 'Không có sản phẩm nào được chọn');
            }

            // Lấy các item được chọn
            $cartItems = CartItem::whereIn('id', $selectedItemIds)
                ->with(['variant.product', 'variant.attribute'])
                ->get();

            // Tính tổng tiền
            $total = $cartItems->sum(function ($item) {
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
                'total_amount'  => $total,
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

            // Xóa các sản phẩm đã đặt khỏi giỏ hàng
            CartItem::whereIn('id', $selectedItemIds)->delete();

            // Xóa session
            session()->forget('selected_cart_items');

            session()->put('order_success', true);
            return redirect()->route('client.order.success')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi đặt hàng: ');
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
