<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Models\AttributeGroup;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listAttributes = Attribute::join('attribute_groups', 'attributes.group_attribute_id', '=', 'attribute_groups.id')
            ->select('attributes.*', 'attribute_groups.name as group_attribute_name')->orderBy('attributes.id', 'desc')
            ->get();

        $groupAttributes = AttributeGroup::query()->pluck('name', 'id')->all();
        return view("backend.pages.attributes.list", compact("listAttributes", "groupAttributes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Attribute::query()->create([
                    'name' => $request->name,
                    'group_attribute_id' => $request->group_attribute_id,
                    'is_wedding' => $request->is_wedding
                ]);
            });
            return redirect()->route('attribute.index')->with('success', 'Thuộc tính mới đã được thêm thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('attribute.index')->with('success', 'Có lỗi, vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute)
    {
        return view("backend.pages.attributes.list", compact("attribute"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        try {
            DB::transaction(function () use ($attribute, $request) {
                $listData = [
                    'name' => $request->name,
                    'group_attribute_id' => $request->group_attribute_id,
                    'is_wedding' => $request->is_wedding
                ];
                $attribute->update($listData);
            });
            return redirect()->route('attribute.index')->with('success', 'Cập nhật thuộc tính thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('attribute.index')->with('success', 'Có lỗi, vui lòng thử lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute)
    {
        try {
            DB::transaction(function () use ($attribute) {
                $attribute->delete();
            });
            return redirect()->route('attribute.index')->with('success', 'Xóa thuộc tính thành công!');
        } catch (\Throwable $e) {
            return redirect()->route('attribute.index')->with('success', 'Có lỗi, vui lòng thử lại!');
        }
    }
}
