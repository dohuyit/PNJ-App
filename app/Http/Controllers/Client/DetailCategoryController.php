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

class DetailCategoryController extends Controller
{
    public function show($type, $id)
    {
        $category = null;
        $products = collect(); // Mặc định danh sách sản phẩm trống

        switch ($type) {
            case 'product-type':
                $category = ProductType::findOrFail($id);
                $products = Product::where('product_type_id', $id)->get();
                break;
            case 'jewelry-line':
                $category = JewelryLine::findOrFail($id);
                $products = Product::where('jewelry_line_id', $id)->get();
                break;
            case 'collection':
                $category = Collection::findOrFail($id);
                $products = Product::where('collection_id', $id)->get();
                break;
            case 'brand':
                $category = Brand::findOrFail($id);
                $products = Product::where('brand_id', $id)->get();
                break;
            default:
                abort(404); // Nếu không đúng loại danh mục nào thì báo lỗi 404
        }

        // Data navbar header
        $dataCategoryParentNav = Category::pluck('name', 'id');
        $dataProductTypesNav = ProductType::where('category_id', 1)->pluck('name', 'id');
        $dataJewelryLinesNav = JewelryLine::where('is_wedding', 1)->pluck('name', 'id');
        $dataCollectionsNav = Collection::where('is_wedding_collection', 1)->pluck('name', 'id');
        $dataBrandsNav = Brand::pluck('name', 'id');

        return view('frontend.detail-category', compact(
            'category',
            'products',
            'type',
            'dataCategoryParentNav',
            'dataProductTypesNav',
            'dataJewelryLinesNav',
            'dataCollectionsNav',
            'dataBrandsNav'
        ));
    }
}
