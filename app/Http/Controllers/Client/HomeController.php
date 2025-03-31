<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\JewelryLine;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private function showDataNavbar()
    {
        return [
            'categories' => Category::query()->take(5)->pluck('name', 'id'),
            'productTypes' => ProductType::where('category_id', 1)->pluck('name', 'id'),
            'jewelryLines' => JewelryLine::where('is_wedding', 1)->pluck('name', 'id'),
            'collections' => Collection::where('is_wedding_collection', 1)->pluck('name', 'id'),
            'brands' => Brand::pluck('name', 'id'),
            'subBanner' => Banner::where('position', 'submenu')->where('priority', 1)->where('is_active', 0)->first()
        ];
    }


    public function index()
    {
        if (session('admin_auth')) {
            Auth::logout();
        }

        $navbarData = $this->showDataNavbar();

        // dd($navbarData);

        $dataBrands = Brand::all();
        $dataNewProducts = Product::where('product_status', 0)->orderBy('created_at', 'desc')->take(8)->get();
        $dataProductFeatures = Product::where('product_status', 0)
            ->where('is_featured', 1)
            ->orderBy('created_at', 'desc')->take(8)->get();
        $dataCollections = Collection::whereNotNull('image_thumbnail')->orderBy('created_at', 'desc')->get();
        $dataJewelryLines = JewelryLine::whereNotNull('image_thumbnail')->orderBy('created_at', 'desc')->get();
        $dataBanners = Banner::where('position', 'slide')->where('is_active', 0)->get();
        $dataVoucher = Voucher::where('type', 0)->where('start_date', '<=', now())
            ->where('end_date', '>=', now())->take(3)->get();

        // dd($dataVoucher);

        return view("frontend.client", array_merge($navbarData, compact(
            'dataBrands',
            'dataNewProducts',
            'dataProductFeatures',
            'dataCollections',
            'dataJewelryLines',
            'dataBanners',
            'dataVoucher'
        )));
    }


    public function getProductByCollections($id)
    {
        if (!$id) {
            return response()->json(['error' => 'Invalid Collection ID'], 400);
        }

        $products = Product::where('collection_id', $id)
            ->where('product_status', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($products);
    }

    public function getJewelryLines($id)
    {
        $jewelryLine = JewelryLine::find($id);

        if (!$jewelryLine) {
            return response()->json(['message' => 'Dòng hàng không tồn tại'], 404);
        }
        $products = Product::where('jewelry_line_id', $id)->get();
        // dd($products);
        return response()->json([
            'banner' => $jewelryLine->image_thumbnail,
            'description' => $jewelryLine->description,
            'products' => $products
        ]);
    }
}
