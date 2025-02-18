<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\Brand;
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
        $brands = Brand::query()->pluck('name', 'id')->all();

        return view("backend.pages.products.add", compact(
            'categories',
            'sizeAttributes',
            'otherAttributeGroups',
            'jewelryLines',
            'productTypes',
            'collections',
            'brands',
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
                    'product_status' => $request->input("product_status", 0),
                    'category_id' => $request->category_id,
                    'jewelry_line_id' => $request->jewelry_line_id,
                    'collection_id' => $request->collection_id,
                    'brand_id' => $request->brand_id,
                    'product_type_id' => $request->product_type_id,
                ];
                // dd($listProducts);

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
                                Variant::insert($listVariants);
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
        $albumImages = ProductImage::where('product_id', $product->id)->get();
        // dd($albumImages);
        $categories = Category::pluck('name', 'id');
        $jewelryLines = JewelryLine::pluck('name', 'id');
        $productTypes = ProductType::pluck('name', 'id');
        $collections = Collection::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        return view("backend.pages.products.edit", compact(
            'product',
            'categories',
            'sizeAttributes',
            'sizeVariants',
            'otherAttributeGroups',
            'albumImages',
            'jewelryLines',
            'productTypes',
            'collections',
            'brands'
        ));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            DB::transaction(function () use ($product, $request) {
                // Cập nhật thông tin sản phẩm
                $dataProducts = [
                    'product_name'    => $request->product_name,
                    'original_price'  => $request->original_price,
                    'sale_price'      => $request->sale_price,
                    'description'     => $request->description,
                    'is_featured'     => $request->input("is_feature", 1),
                    'product_status'  => $request->input("product_status", 0),
                    'category_id'     => $request->category_id,
                    'jewelry_line_id' => $request->jewelry_line_id,
                    'collection_id'   => $request->collection_id,
                    'brand_id'        => $request->brand_id,
                    'product_type_id' => $request->product_type_id,
                ];

                // Xóa ảnh chính nếu người dùng yêu cầu
                if ($request->input('delete_product_image') == "1") {
                    if ($product->product_image && Storage::exists($product->product_image)) {
                        Storage::delete($product->product_image);
                        $product->product_image = null;
                    }
                }

                // Cập nhật ảnh chính nếu có ảnh mới
                if ($request->hasFile('product_image')) {
                    if ($product->product_image && Storage::exists($product->product_image)) {
                        Storage::delete($product->product_image);
                    }
                    $dataProducts['product_image'] = Storage::put('Products', $request->file('product_image'));
                }

                $product->update($dataProducts);

                // Xóa ảnh trong album nếu được chọn
                if ($request->has('delete_images')) {
                    $imagesToDelete = ProductImage::whereIn('id', $request->delete_images)->get();
                    foreach ($imagesToDelete as $image) {
                        if (Storage::exists($image->image_link)) {
                            Storage::delete($image->image_link);
                        }
                    }
                    ProductImage::whereIn('id', $request->delete_images)->delete();
                }

                // Thêm ảnh vào album nếu có
                if ($request->hasFile("album_images")) {
                    foreach ($request->file('album_images') as $file) {
                        ProductImage::create([
                            'product_id'  => $product->id,
                            'image_link'  => Storage::put('Products', $file)
                        ]);
                    }
                }

                // Xử lý variants
                if ($request->input('delete_all_variants') === "1") {
                    // Xóa tất cả variants thuộc nhóm size của sản phẩm
                    $sizeGroupId = AttributeGroup::where('name', 'Size')->value('id');
                    $sizeAttributeIds = Attribute::where('group_attribute_id', $sizeGroupId)->pluck('id');

                    $deleted = Variant::where('product_id', $product->id)
                        ->whereIn('attribute_id', $sizeAttributeIds)
                        ->delete();
                } else {
                    // Xử lý xóa variants đã chọn
                    if ($request->filled('delete_variants')) {
                        $variantIds = explode(',', $request->delete_variants);
                        $deleted = Variant::where('product_id', $product->id)
                            ->whereIn('id', $variantIds)
                            ->delete();
                    }

                    // Xử lý cập nhật/thêm mới variants
                    if ($request->has('attributes')) {
                        $dataAttributes = $request->input('attributes', []);
                        $priceVariants = $request->input('price_variant', []);

                        $sizeGroupId = AttributeGroup::where('name', 'Size')->value('id');

                        foreach ($dataAttributes as $group_id => $attribute_ids) {
                            foreach ($attribute_ids as $index => $attribute_id) {
                                if (!empty($attribute_id)) {
                                    $price = $product->sale_price;

                                    if ((string)$group_id === (string)$sizeGroupId) {
                                        if (
                                            isset($priceVariants[$group_id][$index]) &&
                                            !empty($priceVariants[$group_id][$index])
                                        ) {
                                            $price = $priceVariants[$group_id][$index];
                                        }
                                    }
                                    Variant::updateOrCreate(
                                        [
                                            'product_id'   => $product->id,
                                            'attribute_id' => $attribute_id,
                                        ],
                                        ['price_variant' => $price]
                                    );
                                }
                            }
                        }
                    }
                }
            });

            return redirect()->route('product.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra vui lòng thử lại ');
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

    public function getProductTypes($categoryId)
    {
        $productTypes = ProductType::where('category_id', $categoryId)->get();
        return response()->json($productTypes);
    }
}
