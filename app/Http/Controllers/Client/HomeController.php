<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Collection;
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
        $dataAllCollections = $dataBrands->concat($dataCollections);;
        // dd($dataAllCollections);
        return view("frontend.client", compact('dataBrands', 'dataNewProducts', 'dataProductFeatures', 'dataAllCollections'));
    }

    public function getProducts($type, $id)
    {
        if ($type == 'brand') {
            $products = Product::where('brand_id', $id)
                ->where('product_status', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        } elseif ($type == 'collection') {
            $products = Product::where('collection_id', $id)
                ->where('product_status', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        return response()->json($products);
    }
}
