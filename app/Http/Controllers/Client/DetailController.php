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
        // dd($variantIds);
        $dataDetail = Product::with([
            'variants' => function ($query) use ($variantIds) {
                // dd($query);
                $query->whereIn('id', $variantIds);
            }
        ])->find($id);

        $albumImageProduct = ProductImage::query()->where('product_id', $id)->get();
        // dd($albumImageProduct);
        if (!$dataDetail) {
            abort(404);
        }
        // dd($dataDetail);
        return view('frontend.detail', compact('dataDetail', 'albumImageProduct'));
    }
}
