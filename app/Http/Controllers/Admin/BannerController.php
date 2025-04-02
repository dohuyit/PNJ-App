<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBannerRequest;
use App\Http\Requests\Admin\UpdateBannerRequest;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\JewelryLine;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listBanners = Banner::query()->orderBy('position')->get();
        return view('backend.pages.banners.list', compact('listBanners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.banners.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        // dd($request->all());
        try {
            if ($request->position == 'slide') {
                $countSubmenu = Banner::where('position', 'slide')->count();
                if ($countSubmenu >= 5) {
                    return redirect()->route('banner.create')->with('error', 'Chỉ được phép có tối đa 5 banner là slide.');
                    dd(session()->all());
                }
            }

            if ($request->position == 'submenu') {
                $countSubmenu = Banner::where('position', 'submenu')->count();
                if ($countSubmenu >= 2) {
                    return redirect()->route('banner.create')->with('error', 'Chỉ được phép có tối đa 2 banner là submenu.');
                    dd(session()->all());
                }
            }
            DB::transaction(function () use ($request) {
                $dataBanners = [
                    'name' => $request->name,
                    'link' => $request->link,
                    'position' => $request->position,
                    'reference_table' => $request->reference_id ? $request->position : null,
                    'reference_id' => $request->reference_id,
                    'priority' => $request->priority,
                    'is_active' => $request->is_active,
                ];

                // dd($dataBanners);

                if ($request->hasFile('banner_image')) {
                    $dataBanners['banner_image'] = Storage::put('Banners', $request->file('banner_image'));
                }

                // dd($dataBanners);

                Banner::query()->create($dataBanners);
            });

            return redirect()->route('banner.index')->with('success', 'Thêm banner mới thành công!');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        $collections = Collection::query()->pluck('name', 'id');
        $jewelryLines = JewelryLine::query()->pluck('name', 'id');
        $brands = Brand::query()->pluck('name', 'id');
        return view('backend.pages.banners.edit', compact('banner', 'collections', 'jewelryLines', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        try {
            DB::transaction(function () use ($request, $banner) {
                $dataBanners = [
                    'name' => $request->name,
                    'link' => $request->link,
                    'position' => $request->position,
                    'reference_table' => $request->reference_id ? $request->position : null,
                    'reference_id' => $request->reference_id,
                    'priority' => $request->priority,
                    'is_active' => $request->is_active,
                ];

                // dd($dataBanners);

                if ($request->input('delete_banner_image') == "1" && $banner->banner_image) {
                    Storage::delete($banner->banner_image);
                    $banner->banner_image = null;
                }


                if ($request->hasFile('banner_image')) {
                    if (!empty($banner->banner_image)) {
                        Storage::delete($banner->banner_image);
                    }
                    $dataBanners['banner_image'] = Storage::put('Banners', $request->file('banner_image'));
                }

                // dd($dataBanners);

                $banner->update($dataBanners);
            });

            return redirect()->route('banner.index')->with('success', 'Cập nhật banner thành công');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            DB::transaction(function () use ($banner) {
                $banner->delete();
            });

            if ($banner->banner_image && Storage::exists($banner->banner_image)) {
                Storage::delete($banner->banner_image);
            }

            return redirect()->route('banner.index')->with('success', 'Xóa banner thành công');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    // API để lấy danh sách tham chiếu
    public function getCollections()
    {
        $collections = Collection::all();
        return response()->json($collections);
    }


    public function getJewelryLines()
    {
        $jewelryLines = JewelryLine::all();
        return response()->json($jewelryLines);
    }

    public function getBrands()
    {
        $brands = Brand::all();
        return response()->json($brands);
    }
}
