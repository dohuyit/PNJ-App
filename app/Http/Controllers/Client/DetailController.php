<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Product;
use App\Models\ProductImage;
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
        return view('frontend.detail', compact('dataDetail', 'albumImageProduct'));
    }
}
