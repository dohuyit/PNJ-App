<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $user = Auth::user();
        try {
            if (!$user) {
                return redirect()->route('client.login.form')->with('error', 'Vui lòng đăng nhập tài khoản');
            }

            // dd($user);

            // dd($request->all());
            $cart = Cart::query()->where('user_id', $user->id)->first();

            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => $user->id
                ]);
            }

            if ($request->has('id_variant_product')) {
                $idVariant = intval($request->id_variant_product);
                $variant = Variant::findOrFail($idVariant);
            } else {
                $variant = Variant::where('product_id', intval($request->id_product))->first();

                // dd($variant);
            }



            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('variant_id', $variant->id)
                ->first();
            // dd($cartItem);

            if ($cartItem) {
                $cartItem->increment('quantity');
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'variant_id' => $variant->id,
                    'quantity' => 1,
                ]);
            }

            return redirect()->route('client.cart.show')->with('success', 'Thêm sản phẩm vào giỏ hàng thành công!');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    public function showCart()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('client.login.form')->with('error', 'Vui lòng đăng nhập tài khoản');
        }

        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            return view('frontend.cart', ['dataCarts' => []]);
        }

        $dataCarts = CartItem::where('cart_id', $cart->id)
            ->with('variant.product')
            ->with('variant.attribute')
            ->get();

        $productIds = $dataCarts->pluck('variant.product_id');

        $attributes = Attribute::whereHas('attributegroups', function ($query) {
            $query->where('name', 'Size');
        })
            ->whereHas('variants', function ($query) use ($productIds) {
                $query->whereIn('product_id', $productIds);
            })
            ->get();

        // dd($dataCarts, $attributes);
        return view('frontend.cart', compact('dataCarts', 'attributes'));
    }
}
