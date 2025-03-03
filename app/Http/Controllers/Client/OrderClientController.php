<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderClientController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
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

        // dd($subTotal);
        session(['selected_cart_items' => $selectedItemIds]);

        return view('frontend.order', compact('cartItems', 'subTotal'));
    }

    // public function placeOrder(Request $request)
    // {
    //     try {
    //         DB::beginTransaction();

    //         $user = Auth::user();
    //         if (!$user) {
    //             return redirect()->route('client.login.form')
    //                 ->with('error', 'Vui lòng đăng nhập để thanh toán');
    //         }

    //         // Lấy danh sách item được chọn từ session
    //         $selectedItemIds = session('selected_cart_items', []);
    //         if (empty($selectedItemIds)) {
    //             return redirect()->route('client.cart.show')
    //                 ->with('error', 'Không có sản phẩm nào được chọn');
    //         }

    //         // Validate request
    //         $request->validate([
    //             'full_name' => 'required|string|max:255',
    //             'phone' => 'required|string|max:20',
    //             'address' => 'required|string',
    //             'note' => 'nullable|string',
    //             'payment_method' => 'required|in:cod,banking',
    //         ]);

    //         // Lấy giỏ hàng với các item được chọn
    //         $cart = Cart::where('user_id', $user->id)->first();
    //         if (!$cart) {
    //             return redirect()->route('client.cart.show')
    //                 ->with('error', 'Giỏ hàng không tồn tại');
    //         }

    //         $selectedItems = $cart->items()
    //             ->whereIn('id', $selectedItemIds)
    //             ->with(['variant'])
    //             ->get();

    //         // Tính tổng tiền
    //         $total = $selectedItems->sum(function ($item) {
    //             return $item->variant->price_variant * $item->quantity;
    //         });

    //         // Tạo đơn hàng
    //         $order = Order::create([
    //             'user_id' => $user->id,
    //             'order_code' => 'ORD' . time(),
    //             'full_name' => $request->full_name,
    //             'phone' => $request->phone,
    //             'address' => $request->address,
    //             'note' => $request->note,
    //             'total_amount' => $total,
    //             'payment_method' => $request->payment_method,
    //             'status' => 'pending',
    //         ]);

    //         // Tạo chi tiết đơn hàng
    //         foreach ($selectedItems as $item) {
    //             OrderItem::create([
    //                 'order_id' => $order->id,
    //                 'variant_id' => $item->variant_id,
    //                 'quantity' => $item->quantity,
    //                 'price' => $item->variant->price_variant,
    //                 'total' => $item->variant->price_variant * $item->quantity
    //             ]);
    //         }

    //         // Xóa các sản phẩm đã đặt khỏi giỏ hàng
    //         $cart->items()->whereIn('id', $selectedItemIds)->delete();

    //         // Xóa danh sách selected items khỏi session
    //         session()->forget('selected_cart_items');

    //         DB::commit();

    //         if ($request->payment_method === 'banking') {
    //             return redirect()->route('client.payment.banking', $order->id);
    //         }

    //         return redirect()->route('client.order.success', $order->id)
    //             ->with('success', 'Đặt hàng thành công');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()
    //             ->with('error', 'Có lỗi xảy ra khi đặt hàng: ' . $e->getMessage());
    //     }
    // }
}
