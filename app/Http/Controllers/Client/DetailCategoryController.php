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
use Illuminate\Http\Request;

class DetailCategoryController extends Controller
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

    public function show($type, $id)
    {
        $navbarData = $this->showDataNavbar();
        $category = null;
        $products = collect();

        $productFeature = collect();
        $productNew = collect();
        $bannerJewelryLineNew = null;
        $bannerJewelryLineFeature = null;
        $subBannerCollectionFirst = null;
        $subBannerCollectionSecond = null;

        switch ($type) {
            case 'product-type':
                $category = ProductType::findOrFail($id);
                $products = Product::where('product_type_id', $id)->get();
                break;
            case 'jewelry-line':
                $category = JewelryLine::findOrFail($id);
                $products = Product::where('jewelry_line_id', $id)->get();
                $productFeature = Product::where('jewelry_line_id', $id)->where('is_featured', 1)->get();
                $productNew = Product::where('jewelry_line_id', $id)->where('product_status', 0)->orderBy('created_at', 'desc')->get();
                $bannerJewelryLineNew = Banner::where('position', 'jewelry_lines')->where('reference_id', $id)->where('priority', 1)->first();
                $bannerJewelryLineFeature = Banner::where('position', 'jewelry_lines')->where('reference_id', $id)->where('priority', 2)->first();
                // dd($bannerNew);
                break;
            case 'collection':
                $category = Collection::findOrFail($id);
                $products = Product::where('collection_id', $id)->get();
                $subBannerCollectionFirst = Banner::where('position', 'collections')->where('reference_id', $id)->where('priority', 1)->first();
                $subBannerCollectionSecond = Banner::where('position', 'collections')->where('reference_id', $id)->where('priority', 2)->first();
                break;
            case 'brand':
                $category = Brand::findOrFail($id);
                $products = Product::where('brand_id', $id)->get();
                break;
            default:
                abort(404); // Nếu không đúng loại danh mục nào thì báo lỗi 404
        }

        return view('frontend.detail-category', array_merge($navbarData, compact(
            'category',
            'products',
            'type',
            'productFeature',
            'productNew',
            'bannerJewelryLineFeature',
            'bannerJewelryLineNew',
            'subBannerCollectionFirst',
            'subBannerCollectionSecond'
        )));
    }
}
