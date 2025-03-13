<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Banner;
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

    public function show($id)
    {
        $navbarData = $this->showDataNavbar();

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
        return view('frontend.detail', array_merge($navbarData, compact('dataDetail', 'albumImageProduct')));
    }
}
