<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
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
        return view("backend.pages.collections.add");
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
                    "is_wedding_collection" => $request->input("is_wedding_collection", 1),
                    "is_active" => $request->input("is_active", 0),
                ];

                if ($request->hasFile("banner_image")) {
                    $dataCollections['banner_image'] = Storage::put('Collections', $request->file('banner_image'));
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
        return view('backend.pages.collections.edit', compact('collection'));
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
                    'is_wedding' => $request->input('is_wedding_collection', 1),
                    'is_active' => $request->input('is_active', 0),
                ];

                if ($request->has('remove_image') && $request->remove_image == 1) {
                    if ($collection->banner_image) {
                        Storage::delete($collection->banner_image);
                        $dataCollections['banner_image'] = null;
                    }
                }

                if ($request->hasFile('banner_image')) {
                    if ($collection->banner_image) {
                        Storage::delete($collection->banner_image);
                    }
                    $dataCollections['banner_image'] = Storage::put('Categories', $request->file('banner_image'));
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
