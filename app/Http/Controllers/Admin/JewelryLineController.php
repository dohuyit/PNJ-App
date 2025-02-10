<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JewelryLine;
use App\Http\Requests\StoreJewelryLineRequest;
use App\Http\Requests\UpdateJewelryLineRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JewelryLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listJewelryLines = JewelryLine::all();
        return view("backend.pages.jewelryLines.list", compact("listJewelryLines"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.pages.jewelryLines.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJewelryLineRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $dataJewelryLines = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'is_wedding' => $request->input('is_wedding', 1),
                    'is_active' => $request->input('is_active', 0),
                ];

                // dd($dataJewelryLines);

                if ($request->hasFile('banner_image')) {
                    $dataJewelryLines['banner_image'] = Storage::put('JewelryLines', $request->file('banner_image'));
                }

                // dd($dataJewelryLines);
                JewelryLine::query()->create($dataJewelryLines);
            });
            return redirect()->route('jewelry-line.index')->with('success', 'Dòng hàng mới được thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('jewelry-line.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JewelryLine $jewelryLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JewelryLine $jewelryLine)
    {
        return view("backend.pages.jewelryLines.edit", compact("jewelryLine"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJewelryLineRequest $request, JewelryLine $jewelryLine)
    {
        try {
            DB::transaction(function () use ($request, $jewelryLine) {
                $dataJewelryLines = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'is_wedding' => $request->input('is_wedding', 1),
                    'is_active' => $request->input('is_active', 0),
                ];

                if ($request->has('remove_image') && $request->remove_image == 1) {
                    if ($jewelryLine->banner_image) {
                        Storage::delete($jewelryLine->banner_image);
                        $dataJewelryLines['banner_image'] = null;
                    }
                }

                if ($request->hasFile('banner_image')) {
                    if ($jewelryLine->banner_image) {
                        Storage::delete($jewelryLine->banner_image);
                    }
                    $dataJewelryLines['banner_image'] = Storage::put('Categories', $request->file('banner_image'));
                }
                $jewelryLine->update($dataJewelryLines);
            });
            return redirect()->route('jewelry-line.index')->with('success', 'Dòng hàng đã được cập nhật thành công!');
        } catch (\Exception $e) {
            return redirect()->route('jewelry-line.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JewelryLine $jewelryLine)
    {
        try {
            DB::transaction(function () use ($jewelryLine) {
                $jewelryLine->delete();
            });

            if ($jewelryLine->banner_image && Storage::exists($jewelryLine->banner_image)) {
                Storage::delete($jewelryLine->banner_image);
            }
            return redirect()->route('jewelry-line.index')->with('success', 'Xóa dòng hàng thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('jewelry-line.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}
