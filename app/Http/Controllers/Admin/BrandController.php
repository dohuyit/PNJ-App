<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBrandRequest;
use App\Http\Requests\Admin\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listBrands = Brand::all();
        return view('backend.pages.brands.list', compact("listBrands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.brands.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $dataBrands = [
                    "name" => $request->name,
                    "description" => $request->description,
                    "is_active" => $request->input("is_active", 0),
                ];

                if ($request->hasFile("logo_brand")) {
                    $dataBrands['logo_brand'] = Storage::put('Brands', $request->file('logo_brand'));
                }

                if ($request->hasFile("banner_image")) {
                    $dataBrands['banner_image'] = Storage::put('Brands', $request->file('banner_image'));
                }

                if ($request->hasFile("image_thumbnail")) {
                    $dataBrands['image_thumbnail'] = Storage::put('Brands', $request->file('image_thumbnail'));
                }

                Brand::query()->create($dataBrands);
            });
            return redirect()->route('brand.index')->with('success', 'Thương hiệu mới đã được thêm thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('brand.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('backend.pages.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        try {
            DB::transaction(function () use ($request, $brand) {
                $dataBrands = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'is_active' => $request->input('is_active', 0),
                ];

                if ($request->input('delete_logo_brand') == "1" || $request->input('delete_banner_image') == "1" || $request->input('delete_thumbnail_image') == "1") {
                    if ($request->input('delete_banner_image') == "1" && $brand->banner_image) {
                        Storage::delete($brand->banner_image);
                        $brand->banner_image = null;
                    }

                    if ($request->input('delete_thumbnail_image') == "1" && $brand->image_thumbnail) {
                        Storage::delete($brand->image_thumbnail);
                        $brand->image_thumbnail = null;
                    }

                    if ($request->input('delete_logo_brand') == "1" && $brand->logo_brand) {
                        Storage::delete($brand->logo_brand);
                        $brand->logo_brand = null;
                    }
                }


                if ($request->hasFile('banner_image')) {
                    if (!empty($brand->banner_image)) {
                        Storage::delete($brand->banner_image);
                    }
                    $dataBrands['banner_image'] = Storage::put('Brands', $request->file('banner_image'));
                }

                if ($request->hasFile('image_thumbnail')) {
                    if (!empty($brand->image_thumbnail)) {
                        Storage::delete($brand->image_thumbnail);
                    }
                    $dataBrands['image_thumbnail'] = Storage::put('Brands', $request->file('image_thumbnail'));
                }
                if ($request->hasFile('logo_brand')) {
                    if (!empty($brand->logo_brand)) {
                        Storage::delete($brand->logo_brand);
                    }
                    $dataBrands['logo_brand'] = Storage::put('Brands', $request->file('logo_brand'));
                }

                $brand->update($dataBrands);
            });

            return redirect()->route('brand.index')->with('success', 'Thương hiệu đã được cập nhật thành công!');
        } catch (\Exception $e) {
            return redirect()->route('brand.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            DB::transaction(function () use ($brand) {
                $brand->delete();
            });

            if ($brand->banner_image && Storage::exists($brand->banner_image)) {
                Storage::delete($brand->banner_image);
            }
            if ($brand->logo_brand && Storage::exists($brand->logo_brand)) {
                Storage::delete($brand->logo_brand);
            }
            if ($brand->image_thumbnail && Storage::exists($brand->image_thumbnail)) {
                Storage::delete($brand->image_thumbnail);
            }
            return redirect()->route('brand.index')->with('success', 'Xóa dữ liệu bộ sưu tập thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('brand.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}
