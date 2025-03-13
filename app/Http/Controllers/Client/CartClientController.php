<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Collection;
use App\Models\JewelryLine;
use App\Models\ProductType;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartClientController extends Controller
{

    private function showDataNavbar()
    {
        return [
            'categories' => Category::pluck('name', 'id'),
            'productTypes' => ProductType::where('category_id', 1)->pluck('name', 'id'),
            'jewelryLines' => JewelryLine::where('is_wedding', 1)->pluck('name', 'id'),
            'collections' => Collection::where('is_wedding_collection', 1)->pluck('name', 'id'),
            'brands' => Brand::pluck('name', 'id'),
            'subBanner' => Banner::where('position', 'submenu')->where('priority', 1)->where('is_active', 0)->first()
        ];
    }

    public function addCart(Request $request)
    {
        $user = session('client_auth');;
        try {
            if (!$user) {
                return redirect()->route('client.login.form');
            }


            $cart = Cart::query()->where('user_id', $user->id)->first();

            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => $user->id
                ]);
            }

            if ($request->has('id_variant_product')) {
                // dd($request->id_variant_product);
                $variant = Variant::findOrFail($request->id_variant_product);
            } else {
                $variant = Variant::where('product_id', $request->id_product)->first();

                if (!$variant) {
                    return redirect()->back()->with('error', 'Không tìm thấy biến thể sản phẩm');
                }
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
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function showCart()
    {

        $user = session('client_auth');

        // dd($user);
        if (!$user) {
            return redirect()->route('client.login.form');
        }

        $cart = Cart::where('user_id', $user->id)->first();
        if (!$cart) {
            return view('frontend.cart', ['dataCarts' => []]);
        }

        $navbarData = $this->showDataNavbar();

        $dataCarts = CartItem::where('cart_id', $cart->id)
            ->with('variant.product')
            ->with('variant.attribute')
            ->get();

        // Lấy danh sách size đã được chọn cho từng sản phẩm
        $selectedSizes = [];
        foreach ($dataCarts as $cartItem) {
            $productId = $cartItem->variant->product_id;
            if (!isset($selectedSizes[$productId])) {
                $selectedSizes[$productId] = [];
            }
            $selectedSizes[$productId][] = $cartItem->variant->attribute_id;
        }

        $productIds = $dataCarts->pluck('variant.product_id');

        $attributes = Attribute::whereHas('attributegroups', function ($query) {
            $query->where('name', 'Size');
        })
            ->whereHas('variants', function ($query) use ($productIds) {
                $query->whereIn('product_id', $productIds);
            })
            ->get();

        $dataCategoryParentNav = Category::pluck('name', 'id');
        $dataProductTypesNav = ProductType::where('category_id', 1)->pluck('name', 'id');
        $dataJewelryLinesNav = JewelryLine::where('is_wedding', 1)->pluck('name', 'id');
        $dataCollectionsNav = Collection::where('is_wedding_collection', 1)->pluck('name', 'id');
        $dataBrandsNav = Brand::pluck('name', 'id');

        return view('frontend.cart', array_merge($navbarData, compact('dataCarts', 'attributes', 'selectedSizes')));
    }

    public function delete(Request $request)
    {
        try {

            $cartId = intval($request->cart_id);
            $cartItem = CartItem::findOrFail($cartId);

            // dd($cartItem);
            $cartItem->delete();

            return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa sản phẩm');
        }
    }

    public function deleteAll(Request $request)
    {
        try {

            // dd($request->all());
            $cartIds = explode(',', $request->cart_ids);

            // dd($cartIds);
            CartItem::whereIn('id', $cartIds)->delete();

            return redirect()->back()->with('success', 'Xóa tất cả sản phẩm thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa sản phẩm');
        }
    }

    public function updateQuantity(Request $request)
    {
        try {
            $cartItem = CartItem::findOrFail($request->cart_id);
            $quantity = max(1, min(3, $request->quantity)); // Giới hạn số lượng từ 1-3
            $cartItem->quantity = $quantity;
            $cartItem->save();

            return response()->json([
                'status' => 'success',
                'newPrice' => formatPrice($cartItem->variant->price_variant * $quantity),
                'message' => 'Cập nhật số lượng thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra khi cập nhật số lượng'
            ], 500);
        }
    }

    public function updateSize(Request $request)
    {
        try {
            $cartItem = CartItem::findOrFail($request->cart_id);
            $newVariant = Variant::where('product_id', $cartItem->variant->product_id)
                ->where('attribute_id', $request->size_id)
                ->firstOrFail();

            $cartItem->variant_id = $newVariant->id;
            $cartItem->save();

            return response()->json([
                'status' => 'success',
                'newPrice' => formatPrice($newVariant->price_variant * $cartItem->quantity),
                'message' => 'Cập nhật size thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra khi cập nhật size'
            ], 500);
        }
    }
}
