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
use Carbon\Carbon;
use Illuminate\Http\Request;
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

    public function update(Request $request, Order $order)
    {
        try {
            DB::transaction(function () use ($order, $request) {
                $order->update([
                    'status_id' => $request->status_id,
                    'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
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
        // dd($order->all());
        try {
            DB::transaction(function () use ($order) {
                $order->delete();
            });

            return redirect()->route('order.index')->with('success', 'Xóa đơn hàng thành công!');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
