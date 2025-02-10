<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Http\Requests\StoreAttributeGroupRequest;
use App\Http\Requests\UpdateAttributeGroupRequest;
use Illuminate\Support\Facades\DB;


class AttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listAttributeGroups = AttributeGroup::all();
        return view("backend.pages.groupAttributes.list", compact("listAttributeGroups"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeGroupRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                AttributeGroup::query()->create([
                    "name" => $request->name,
                ]);
            });
            return redirect()->route('attribute-group.index')->with('success', 'nhóm thuộc tính mới đã được thêm thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('attribute-group.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AttributeGroup $attributeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttributeGroup $attributeGroup)
    {
        return view("backend.pages.groupAttributes.list", compact("attributeGroup"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttributeGroupRequest $request, AttributeGroup $attributeGroup)
    {
        try {
            DB::transaction(function () use ($attributeGroup, $request) {
                $attributeGroup->update([
                    "name" => $request->name,
                ]);
            });
            return redirect()->route('attribute-group.index')->with('success', 'nhóm thuộc tính mới đã cập nhật thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('attribute-group.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttributeGroup $attributeGroup)
    {
        try {
            DB::transaction(function () use ($attributeGroup) {
                $attributeGroup->delete();
            });
            return redirect()->route('attribute-group.index')->with('success', 'Xóa nhóm thuộc tính thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('attribute-group.index')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}
