<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCategories = Category::all();
        // dd($listCategories);
        return view("Backend.pages.categories.list", compact("listCategories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.pages.categories.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $dataCategories = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'is_active' => $request->input('is_active', 0),
                ];

                // dd($dataCategories);

                if ($request->hasFile('banner_image')) {
                    $dataCategories['banner_image'] = Storage::put('Categories', $request->file('banner_image'));
                }
                // dd($dataCategories);
                Category::query()->create($dataCategories);
            });
            return redirect()->route('category.index')->with('success', 'Danh mục đã được thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("Backend.pages.categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // dd($request->all());
        try {
            DB::transaction(function () use ($request, $category) {
                $dataCategories = [
                    'name_category' => $request->name,
                    'description' => $request->description,
                    'is_active' => $request->input('is_active', 0),
                ];

                if ($request->has('remove_image') && $request->remove_image == 1) {
                    if ($category->banner_image) {
                        Storage::delete($category->banner_image);
                        $dataCategories['banner_image'] = null;
                    }
                }

                if ($request->hasFile('banner_image')) {
                    if ($category->banner_image) {
                        // Xóa ảnh cũ nếu tồn tại
                        Storage::delete($category->banner_image);
                    }
                    $dataCategories['banner_image'] = Storage::put('Categories', $request->file('banner_image'));
                }
                $category->update($dataCategories);
            });
            return redirect()->route('category.index')->with('success', 'Danh mục đã được cập nhật thành công!');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            // dd($category);
            DB::transaction(function () use ($category) {
                $category->delete();
            });

            if ($category->banner_image && Storage::exists($category->banner_image)) {
                Storage::delete($category->banner_image);
            }
            return redirect()->route('category.index')->with('success', 'Xóa danh mục thành công!');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}
