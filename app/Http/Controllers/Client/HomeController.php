<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\JewelryLine;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (session('admin_auth')) {
            Auth::logout();
        }
        $dataBrands = Brand::all();
        $dataNewProducts = Product::query()->where('product_status', "=", 0)->orderBy('created_at', 'desc')->take(8)->get();
        $dataProductFeatures = Product::query()
            ->where('product_status', "=", 0)
            ->where('is_featured', '=', 1)
            ->orderBy('created_at', 'desc')->take(8)->get();
        $dataCollections = Collection::query()
            ->whereNotNull('image_thumbnail')
            ->orderBy('created_at', 'desc')
            ->get();
        $dataJewelryLines = JewelryLine::query()
            ->whereNotNull('image_thumbnail')
            ->orderBy('created_at', 'desc')
            ->get();
        $dataCategoryParentNav = Category::pluck('name', 'id');
        $dataProductTypesNav = ProductType::where('category_id', 1)->pluck('name', 'id');
        $dataJewelryLinesNav = JewelryLine::where('is_wedding', 1)->pluck('name', 'id');
        $dataCollectionsNav = Collection::where('is_wedding_collection', 1)->pluck('name', 'id');
        $dataBrandsNav = Brand::pluck('name', 'id');

        return view("frontend.client", compact('dataBrands', 'dataNewProducts', 'dataProductFeatures', 'dataCollections', 'dataJewelryLines', 'dataCategoryParentNav', 'dataProductTypesNav', 'dataJewelryLinesNav', 'dataCollectionsNav', 'dataBrandsNav'));
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
