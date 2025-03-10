<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\JewelryLine;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listBanners = Banner::all();
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
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
