<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\AttributeGroup;
use App\Models\Category;
use App\Models\Collection;
use App\Models\JewelryLine;
use App\Models\ProductImage;
use App\Models\ProductType;
use App\Models\Variant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listProducts = Product::all();
        return view("backend.pages.products.list", compact("listProducts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sizeAttributes = AttributeGroup::where('name', 'Size')
            ->with('attributes')
            ->first();

        // dd($sizeAttributes);

        $otherAttributeGroups = AttributeGroup::where('name', '!=', 'Size')
            ->with('attributes')
            ->get();

        // dd($otherAttributeGroups);
        $categories = Category::query()->pluck('name', 'id')->all();
        $jewelryLines = JewelryLine::query()->pluck('name', 'id')->all();
        $productTypes = ProductType::query()->pluck('name', 'id')->all();
        $collections = Collection::query()->pluck('name', 'id')->all();

        return view("backend.pages.products.add", compact(
            'categories',
            'sizeAttributes',
            'otherAttributeGroups',
            'jewelryLines',
            'productTypes',
            'collections',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            // dd($request->all());
            DB::transaction(function () use ($request) {
                $listProducts = [
                    'product_name' => $request->product_name,
                    'original_price' => $request->original_price,
                    'sale_price' => $request->sale_price,
                    'description' => $request->description,
                    'is_featured' => $request->input("is_feature", 1),
                    'is_wedding' => $request->input("is_wedding", 1),
                    'product_status' => $request->input("product_status", 0),
                    'category_id' => $request->category_id,
                    'jewelry_line_id' => $request->jewelry_line_id,
                    'collection_id' => $request->collection_id,
                    'product_type_id' => $request->product_type_id,
                ];

                if ($request->hasFile("product_image")) {
                    $listProducts['product_image'] = Storage::put('Products', $request->file('product_image'));
                }

                $product = Product::create($listProducts);

                // dd($product);

                if ($request->hasFile("album_images")) {
                    foreach ($request->file('album_images') as $file) {
                        $albumPath = Storage::put('Products', $file);
                        ProductImage::create([
                            'product_id' => $product->id,
                            'image_link' => $albumPath
                        ]);
                    }
                }
                // dd($request->all());
                // dd($product);
                // if ($request->has('attributes')) {

                //     $dataAttributes = $request->input('attributes');
                //     // dd($dataAttributes);


                //     // dd('abc');
                //     $priceVariants = $request->price_variant ?? [];

                //     // dd($priceVariants);

                //     foreach ($dataAttributes as $group_id => $attribute_ids) {
                //         foreach ($attribute_ids as $index => $attribute_id) {
                //             if (!empty($attribute_id)) {
                //                 $listVariants = [
                //                     'product_id' => $product->id,
                //                     'attribute_id' => $attribute_id,
                //                     'price_variant' => (!empty($priceVariants[$index]) ? $priceVariants[$index] : $product->sale_price),
                //                 ];
                //                 Variant::create($listVariants);
                //             }
                //         }
                //     }
                // }

                if ($request->has('attributes')) {
                    $dataAttributes = $request->input('attributes');
                    $priceVariants = $request->price_variant ?? [];

                    foreach ($dataAttributes as $group_id => $attribute_ids) {
                        foreach ($attribute_ids as $index => $attribute_id) {
                            if (!empty($attribute_id)) {
                                $price = ($group_id == 1 && !empty($priceVariants[$index]))
                                    ? $priceVariants[$index]
                                    : $product->sale_price;

                                $listVariants = [
                                    'product_id'    => $product->id,
                                    'attribute_id'  => $attribute_id,
                                    'price_variant' => $price,
                                ];
                                Variant::create($listVariants);
                            }
                        }
                    }
                }
            });
            return redirect()->route('product.index')->with('success', 'Sản phẩm đã được thêm thành công.');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Lấy nhóm thuộc tính "Size" cùng với danh sách thuộc tính của nó
        $sizeAttributes = AttributeGroup::where('name', 'Size')->with('attributes')->first();
        $product->load('variants');
        $sizeVariants = $product->variants->whereIn('attribute_id', $sizeAttributes->attributes->pluck('id'));

        $otherAttributeGroups = AttributeGroup::where('name', '!=', 'Size')->with('attributes')->get();

        $categories = Category::pluck('name', 'id');
        $jewelryLines = JewelryLine::pluck('name', 'id');
        $productTypes = ProductType::pluck('name', 'id');
        $collections = Collection::pluck('name', 'id');
        return view("backend.pages.products.edit", compact(
            'product',
            'categories',
            'sizeAttributes',
            'sizeVariants', // Danh sách biến thể Size
            'otherAttributeGroups',
            'jewelryLines',
            'productTypes',
            'collections'
        ));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            DB::transaction(function () use ($product, $request) {
                $listProducts = [
                    'product_name'   => $request->product_name,
                    'original_price' => $request->original_price,
                    'sale_price'     => $request->sale_price,
                    'description'    => $request->description,
                    'is_featured'    => $request->input("is_feature", 1),
                    'is_wedding'     => $request->input("is_wedding", 1),
                    'product_status' => $request->input("product_status", 0),
                    'category_id'    => $request->category_id,
                    'jewelry_line_id' => $request->jewelry_line_id,
                    'collection_id'  => $request->collection_id,
                    'product_type_id' => $request->product_type_id,
                ];

                if ($request->hasFile("product_image")) {
                    $listProducts['product_image'] = Storage::put('Products', $request->file('product_image'));
                }

                $product->update($listProducts);

                // Xóa ảnh cũ nếu có ảnh mới
                if ($request->hasFile("album_images")) {
                    ProductImage::where('product_id', $product->id)->delete();
                    foreach ($request->file('album_images') as $file) {
                        ProductImage::create([
                            'product_id'  => $product->id,
                            'image_link'  => Storage::put('Products', $file)
                        ]);
                    }
                }

                // Xử lý biến thể
                if ($request->has('attributes')) {
                    $dataAttributes = $request->input('attributes');
                    $priceVariants  = $request->price_variant ?? [];

                    // Xóa biến thể cũ trước khi thêm mới
                    Variant::where('product_id', $product->id)->delete();

                    foreach ($dataAttributes as $group_id => $attribute_ids) {
                        foreach ($attribute_ids as $index => $attribute_id) {
                            if (!empty($attribute_id)) {
                                // Chỉ nhóm "Size" (id = 1) mới có giá biến thể
                                $price = ($group_id == 1 && isset($priceVariants[$index]))
                                    ? $priceVariants[$index]
                                    : $product->sale_price;

                                Variant::create([
                                    'product_id'    => $product->id,
                                    'attribute_id'  => $attribute_id,
                                    'price_variant' => $price,
                                ]);
                            }
                        }
                    }
                }
            });

            return redirect()->route('product.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            DB::transaction(function () use ($product) {
                $product->delete();
                $product->variants()->delete();
                foreach ($product->albumImages as $image) {
                    if (Storage::exists($image->filename)) {
                        Storage::delete($image->filename);
                    }
                    $image->delete();
                }
            });

            if ($product->product_image && Storage::exists($product->product_image)) {
                Storage::delete($product->product_image);
            }
            return redirect()->route('product.index')->with('success', 'Xóa danh mục thành công!');
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}
