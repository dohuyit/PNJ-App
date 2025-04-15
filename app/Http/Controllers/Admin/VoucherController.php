<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVoucherRequest;
use App\Http\Requests\Admin\UpdateVoucherRequest;
use App\Models\Voucher;
use App\Models\CustomerVoucher;
use App\Models\Product;
use App\Models\ProductVoucher;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listVouchers = Voucher::all();

        return view('backend.pages.vouchers.list', compact('listVouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listUsers = User::with(
            [
                'city',
                'district',
                'ward'
            ]
        )->where('status', 0)->where('role_id', 2)->orderBy('id', 'desc')->get();
        $listProducts = Product::where('product_status', 0)->get();

        // dd($listUsers);
        return view('backend.pages.vouchers.add', compact('listUsers', 'listProducts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoucherRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $listDataVouchers = [
                    'voucher_code' => $request->voucher_code,
                    'voucher_name' => $request->voucher_name,
                    'description' => $request->description,
                    'max_uses' => $request->max_uses,
                    'max_uses_user' => $request->max_uses_user,
                    'min_order_value' => $request->min_order_value,
                    'type' => $request->type,
                    'discount_amount' => $request->discount_amount,
                    'is_fixed' => $request->is_fixed,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                ];

                // dd($listDataVouchers);

                $voucher = Voucher::query()->create($listDataVouchers);

                // dd($request->product_id, $request->user_id);

                if ($request->type == 1 && $request->has('product_id')) {
                    foreach ($request->product_id as $id) {
                        ProductVoucher::create([
                            'product_id' => $id,
                            'voucher_id' => $voucher->id
                        ]);
                    }
                }

                if ($request->type == 2 && $request->has('user_id')) {
                    foreach ($request->user_id as $id) {
                        CustomerVoucher::create([
                            'user_id' => $id,
                            'voucher_id' => $voucher->id
                        ]);
                    }
                }
            });

            return redirect()->route('voucher.index')->with('success', 'Thêm mã giảm giá thành công');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voucher $voucher)
    {
        $listUsers = User::with(
            [
                'city',
                'district',
                'ward'
            ]
        )->where('status', 0)->where('role_id', 2)->orderBy('id', 'desc')->get();
        $listProducts = Product::where('product_status', 0)->get();

        $dataVoucherDetail = Voucher::with(['products', 'users'])->where('id', $voucher->id)->first();
        // dd($dataVoucherDetail);
        // dd($listUsers);
        return view('backend.pages.vouchers.edit', compact('listUsers', 'listProducts', 'dataVoucherDetail', 'voucher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoucherRequest $request, Voucher $voucher)
    {
        try {
            DB::transaction(function () use ($request, $voucher) {
                $listDataVouchers = [
                    'voucher_code' => $request->voucher_code,
                    'voucher_name' => $request->voucher_name,
                    'description' => $request->description,
                    'max_uses' => $request->max_uses,
                    'max_uses_user' => $request->max_uses_user,
                    'min_order_value' => $request->min_order_value,
                    'type' => $request->type,
                    'discount_amount' => $request->discount_amount,
                    'is_fixed' => $request->is_fixed,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                ];

                $voucher->update($listDataVouchers);

                ProductVoucher::where('voucher_id', $voucher->id)->delete();
                CustomerVoucher::where('voucher_id', $voucher->id)->delete();

                if ($request->type == 1 && $request->has('product_id')) {
                    foreach ($request->product_id as $id) {
                        ProductVoucher::create([
                            'product_id' => $id,
                            'voucher_id' => $voucher->id
                        ]);
                    }
                }

                if ($request->type == 2 && $request->has('user_id')) {
                    foreach ($request->user_id as $id) {
                        CustomerVoucher::create([
                            'user_id' => $id,
                            'voucher_id' => $voucher->id
                        ]);
                    }
                }
            });

            return redirect()->route('voucher.index')->with('success', 'Cập nhật mã giảm giá thành công');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        try {
            DB::transaction(function () use ($voucher) {
                $voucher->delete();
            });

            return redirect()->route('voucher.index')->with('success', 'Xóa mã khuyễn mãi thành công');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
