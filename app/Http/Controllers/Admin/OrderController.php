<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderItemsData = OrderItem::with([
            'variant.product',
            'order.city',
            'order.district',
            'order.ward',
            'order.paymentMethod',
            'order.orderStatus'
        ])->orderBy('id', 'desc')->get();

        // dd($orderItemsData);

        return view('backend.pages.orders.list', compact('orderItemsData'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {

        $dataOrder = Order::with([
            'orderItems.variant.product',
            'city',
            'district',
            'ward',
            'orderStatus'
        ])->where('id', $order->id)->first();

        $listStatus = OrderStatus::query()->pluck('name', 'id')->all();
        // dd($dataOrder);
        return view('backend.pages.orders.edit', compact('dataOrder', 'listStatus'));
    }

    public function exportInvoice($orderId)
    {
        $order = Order::with('orderItems.variant.product')->findOrFail($orderId);

        // dd($order);

        $pdf = PDF::loadView('backend.pages.orders.invoice', compact('order'));

        return $pdf->download('Hóa_Đơn_Mua_Hàng_PNJ_' . random_int(10000, 99999) . '.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        try {
            DB::transaction(function () use ($order, $request) {
                $order->update([
                    'status_id' => $request->status_id,
                ]);
            });

            return redirect()->route('order.index')->with('success', 'Cập nhật đơn hàng thành công');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
