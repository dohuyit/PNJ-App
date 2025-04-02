<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCollectionRequest;
use App\Http\Requests\Admin\UpdateCollectionRequest;
use App\Models\Collection;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCollections = Collection::all();
        return view("backend.pages.collections.list", compact("listCollections"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::query()->pluck('name', 'id')->all();
        return view("backend.pages.collections.add", compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $dataCollections = [
                    "name" => $request->name,
                    "description" => $request->description,
                    "brand_id" => $request->brand_id,
                    "is_wedding_collection" => $request->input("is_wedding_collection", 1),
                    "is_active" => $request->input("is_active", 0),
                ];

                if ($request->hasFile("banner_image")) {
                    $dataCollections['banner_image'] = Storage::put('Collections', $request->file('banner_image'));
                }

                if ($request->hasFile("image_thumbnail")) {
                    $dataCollections['image_thumbnail'] = Storage::put('Collections', $request->file('image_thumbnail'));
                }

                Collection::query()->create($dataCollections);
            });
            return redirect()->route('collection.index')->with('success', 'Bộ sưu tập mới đã được thêm thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('collection.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        $brands = Brand::pluck('name', 'id');
        return view('backend.pages.collections.edit', compact('collection', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        try {
            DB::transaction(function () use ($request, $collection) {
                $dataCollections = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'brand_id' => $request->brand_id,
                    'is_wedding_collection' => $request->input('is_wedding_collection', 1),
                    'is_active' => $request->input('is_active', 0),
                ];

                if ($request->input('delete_banner_image') == "1" || $request->input('delete_thumbnail_image') == "1") {
                    if ($request->input('delete_banner_image') == "1" && $collection->banner_image) {
                        Storage::delete($collection->banner_image);
                        $collection->banner_image = null;
                    }

                    if ($request->input('delete_thumbnail_image') == "1" && $collection->image_thumbnail) {
                        Storage::delete($collection->image_thumbnail);
                        $collection->image_thumbnail = null;
                    }
                }


                if ($request->hasFile('banner_image')) {
                    if (!empty($collection->banner_image)) {
                        Storage::delete($collection->banner_image);
                    }
                    $dataCollections['banner_image'] = Storage::put('Collections', $request->file('banner_image'));
                }

                if ($request->hasFile('image_thumbnail')) {
                    if (!empty($collection->image_thumbnail)) {
                        Storage::delete($collection->image_thumbnail);
                    }
                    $dataCollections['image_thumbnail'] = Storage::put('Collections', $request->file('image_thumbnail'));
                }

                $collection->update($dataCollections);
            });

            return redirect()->route('collection.index')->with('success', 'Bộ sưu tập đã được cập nhật thành công!');
        } catch (\Exception $e) {
            return redirect()->route('collection.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        try {
            DB::transaction(function () use ($collection) {
                $collection->delete();
            });

            if ($collection->banner_image && Storage::exists($collection->banner_image)) {
                Storage::delete($collection->banner_image);
            }
            return redirect()->route('collection.index')->with('success', 'Xóa dữ liệu bộ sưu tập thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('collection.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}
