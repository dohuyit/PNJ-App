<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\JewelryLine;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductType;
use App\Models\Variant;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show($id)
    {
        $variantIds = Variant::whereHas('attribute.attributegroups', function ($query) {
            $query->where('name', 'Size');
        })->pluck('id');

        $dataDetail = Product::with([
            'variants' => function ($query) use ($variantIds) {
                $query->whereIn('id', $variantIds)->with('attribute');
            },
        ])->find($id);

        // dd($dataDetail->variants);

        $albumImageProduct = ProductImage::query()->where('product_id', $id)->get();
        // dd($albumImageProduct);

        if (!$dataDetail) {
            abort(404);
        }
        // dd($dataDetail);

        $dataCategoryParentNav = Category::pluck('name', 'id');
        $dataProductTypesNav = ProductType::where('category_id', 1)->pluck('name', 'id');
        $dataJewelryLinesNav = JewelryLine::where('is_wedding', 1)->pluck('name', 'id');
        $dataCollectionsNav = Collection::where('is_wedding_collection', 1)->pluck('name', 'id');
        $dataBrandsNav = Brand::pluck('name', 'id');

        return view('frontend.detail', compact('dataDetail', 'albumImageProduct', 'dataCategoryParentNav', 'dataProductTypesNav', 'dataJewelryLinesNav', 'dataCollectionsNav', 'dataBrandsNav'));
    }
}
