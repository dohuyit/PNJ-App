<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Http\Requests\StoreProductTypeRequest;
use App\Http\Requests\UpdateProductTypeRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listProductTypes = ProductType::join('categories', 'product_types.category_id', '=', 'categories.id')
            ->select('product_types.*', 'categories.name as category_name')->orderBy('product_types.id', 'desc')
            ->get();
        return view("backend.pages.productTypes.list", compact("listProductTypes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Categories = Category::query()->pluck("name", "id")->all();
        return view("backend.pages.productTypes.add", compact("Categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductTypeRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $productTypes = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'is_active' => $request->input('is_active', 0),
                    'category_id' => $request->category_id,
                ];

                if ($request->hasFile('banner_image')) {
                    $productTypes['banner_image'] = Storage::put('ProductTypes', $request->file('banner_image'));
                }

                if ($request->hasFile('image_thumbnail')) {
                    $productTypes['image_thumbnail'] = Storage::put('ProductTypes', $request->file('image_thumbnail'));
                }

                // dd($productTypes);
                ProductType::query()->create($productTypes);
            });
            return redirect()->route('product-type.index')->with('success', 'Thêm thành công loại sản phẩm mới!');
        } catch (\Throwable $e) {
            return redirect()->route('product-type.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $productType)
    {
        $Categories = Category::query()->pluck("name", "id")->all();
        return view('backend.pages.productTypes.edit', compact('productType', 'Categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductTypeRequest $request, ProductType $productType)
    {
        try {
            DB::transaction(function () use ($request, $productType) {
                $dataProductTypes = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'is_active' => $request->input('is_active', 0),
                    'category_id' => $request->category_id,
                ];

                if ($request->input('delete_banner_image') == "1" || $request->input('delete_thumbnail_image') == "1") {
                    if ($request->input('delete_banner_image') == "1" && $productType->banner_image) {
                        Storage::delete($productType->banner_image);
                        $productType->banner_image = null;
                    }

                    if ($request->input('delete_thumbnail_image') == "1" && $productType->image_thumbnail) {
                        Storage::delete($productType->image_thumbnail);
                        $productType->image_thumbnail = null;
                    }
                }


                if ($request->hasFile('banner_image')) {
                    if (!empty($productType->banner_image)) {
                        Storage::delete($productType->banner_image);
                    }
                    $dataProductTypes['banner_image'] = Storage::put('ProductTypes', $request->file('banner_image'));
                }

                if ($request->hasFile('image_thumbnail')) {
                    if (!empty($productType->image_thumbnail)) {
                        Storage::delete($productType->image_thumbnail);
                    }
                    $dataProductTypes['image_thumbnail'] = Storage::put('ProductTypes', $request->file('image_thumbnail'));
                }
                $productType->update($dataProductTypes);
            });
            return redirect()->route('product-type.index')->with('success', 'Loại sản phẩm được cập nhật thành công!');
        } catch (\Exception $e) {
            return redirect()->route('product-type.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        try {
            // dd($ProductTypes);
            DB::transaction(function () use ($productType) {
                $productType->delete();
            });
            // dd($ProductTypes);

            if ($productType->banner_image && Storage::exists($productType->banner_image)) {
                Storage::delete($productType->banner_image);
            }
            return redirect()->route('product-type.index')->with('success', 'Xóa loại sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('product-type.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}
