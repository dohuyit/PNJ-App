<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\JewelryLine;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
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
        return view("frontend.client", compact('dataBrands', 'dataNewProducts', 'dataProductFeatures', 'dataCollections', 'dataJewelryLines'));
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
}
