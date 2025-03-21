@extends('frontend.layouts.app')

@section('title', 'Thông tin khách hàng')

@section('content')
    <div class="container-fluid">
        <div class="row g-5">
            @include('frontend.layouts.include.aside')
            <main id="main" class="col-md-10">
                @include('frontend.layouts.include.nav')
                <div class="main-content">
                    <section id="header" class="mb-3">
                        <div class="content-header">
                            <div class="container-fluid">
                                <h2 class="fs-5 py-2">
                                    <span>Trang chủ</span>
                                    <span>/</span>
                                    <span>Thông tin đơn hàng</span>
                                </h2>
                            </div>
                        </div>
                    </section>
                    <section id="content" class="mb-5">
                        <div class="container-fluid">
                            <!-- Thông tin đơn hàng -->
                            <div class="card luxury-card mb-4">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 fw-bold">Thông tin đơn hàng {{ '#' . $detailOrder->order_code }}</h5>
                                    @php
                                        $statusClasses = [
                                            1 => 'status-pending',
                                            2 => 'status-confirmed',
                                            3 => 'status-processing',
                                            4 => 'status-shipping',
                                            5 => 'status-delivered',
                                            6 => 'status-cancelled',
                                            7 => 'status-returned',
                                        ];
                                    @endphp
                                    @if ($detailOrder->status_id == 5)
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('client.home') }}"
                                                class="btn btn-outline-primary rounded-pill">Mua lại</a>
                                            <span
                                                class="status-badge {{ $statusClasses[$detailOrder->orderStatus->id] ?? 'status-pending' }}">
                                                {{ $detailOrder->orderStatus->name }}
                                            </span>
                                        </div>
                                    @else
                                        <span
                                            class="status-badge {{ $statusClasses[$detailOrder->orderStatus->id] ?? 'status-pending' }}">
                                            {{ $detailOrder->orderStatus->name }}
                                        </span>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <p class="text-muted mb-1">Ngày đặt hàng</p>
                                            <p class="fw-bold mb-0">
                                                {{ \Carbon\Carbon::parse($detailOrder->date)->format('d-m-Y') }}</p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <p class="text-muted mb-1">Phương thức thanh toán</p>
                                            <p class="fw-bold mb-0">{{ $detailOrder->paymentMethod->name }}</p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <p class="text-muted mb-1">Tổng giá trị</p>
                                            <p class="fw-bold mb-0 price-highlight">
                                                {{ formatPrice($detailOrder->total_amount) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Thông tin giao hàng -->
                            <div class="card luxury-card mb-4">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0 fw-bold">Thông tin giao hàng</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <p class="text-muted mb-1">Người nhận</p>
                                            <p class="fw-bold mb-0">{{ $detailOrder->name }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <p class="text-muted mb-1">Số điện thoại</p>
                                            <p class="fw-bold mb-0">{{ $detailOrder->phone }}</p>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <p class="text-muted mb-1">Địa chỉ giao hàng</p>
                                            <p class="fw-bold mb-0">{{ $detailOrder->address }}</p>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <p class="text-muted mb-1">Phương thức vận chuyển</p>
                                            <p class="fw-bold mb-0">Giao hàng nhanh</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Chi tiết sản phẩm -->
                            <div class="card luxury-card mb-4">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0 fw-bold">Chi tiết sản phẩm</h5>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table luxury-table mb-0 text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Ảnh sản phẩm</th>
                                                    <th scope="col">Sản phẩm</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Đơn giá</th>
                                                    <th scope="col">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detailOrder->orderItems as $orderItem)
                                                    <tr>
                                                        <td>
                                                            <div class="product-image-container m-auto">
                                                                <img src="{{ Storage::url($orderItem->variant->product->product_image) }}"
                                                                    alt="Sản phẩm" class="product-image ">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-name-container">
                                                                <h6 class="product-name mb-1">
                                                                    {{ $orderItem->variant->product->product_name }}</h6>
                                                                <p class="product-variant mb-0">Loại:
                                                                    {{ $orderItem->variant->product->productType->name }} |
                                                                    Dòng hàng:
                                                                    {{ $orderItem->variant->product->jewelryLine->name }}
                                                                    @if ($orderItem->variant->attribute->attributegroups->name == 'Size')
                                                                        |
                                                                        Size: {{ $orderItem->variant->attribute->name }}
                                                                    @endif

                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">{{ $orderItem->quantity }}</td>
                                                        <td>{{ formatPrice($orderItem->unit_price) }}</td>
                                                        <td class="fw-bold price-highlight">
                                                            {{ formatPrice($orderItem->total_price) }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Thông tin thanh toán -->
                            <div class="card luxury-card mb-4">
                                <div class="card-header bg-white d-flex align-items-center">
                                    <i class="fas fa-wallet me-2 text-primary"></i>
                                    <h5 class="mb-0 fw-bold">Thông tin thanh toán</h5>
                                </div>
                                <div class="card-body p-0">
                                    <div class="payment-info">
                                        <div class="info-row">
                                            <div class="label-group">
                                                <i class="fas fa-receipt text-muted"></i>
                                                <span>Tạm tính</span>
                                            </div>
                                            <div class="amount">
                                                {{ formatPrice($detailOrder->orderItems->sum('total_price')) }}</div>
                                        </div>

                                        <div class="info-row">
                                            <div class="label-group">
                                                <i class="fas fa-truck text-muted"></i>
                                                <span>Phí vận chuyển</span>
                                            </div>
                                            <div class="amount">
                                                @if ($detailOrder->shipping_fee > 0)
                                                    {{ formatPrice($detailOrder->shipping_fee) }}
                                                @else
                                                    <span class="shipping-badge">Miễn phí</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="info-row">
                                            <div class="label-group">
                                                <i class="fas fa-tags text-muted"></i>
                                                <span>Giảm giá</span>
                                            </div>
                                            <div class="amount text-danger">
                                                @if ($detailOrder->discount_amount > 0)
                                                    - {{ formatPrice($detailOrder->discount_amount) }}
                                                @else
                                                    - 0 ₫
                                                @endif
                                            </div>
                                        </div>

                                        <div class="info-row total">
                                            <div class="label-group">
                                                <i class="fas fa-coins text-muted"></i>
                                                <span>Tổng thanh toán</span>
                                            </div>
                                            <div class="amount price-highlight">
                                                {{ formatPrice($detailOrder->total_amount) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nút tác vụ -->
                            <div class="d-flex justify-content-end mt-4">
                                <div>
                                    <a href="{{ route('order.export.invoice', $detailOrder->id) }}"
                                        class="btn btn-outline-luxury me-2">
                                        <i class="fas fa-print me-2"></i>In đơn hàng
                                    </a>
                                    <button class="btn btn-luxury">
                                        <i class="fas fa-headset me-2"></i>Liên hệ hỗ trợ
                                    </button>
                                </div>
                            </div>

                            <!-- Theo dõi đơn hàng -->
                            <div class="card luxury-card mt-4">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0 fw-bold">Theo dõi đơn hàng</h5>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="position-relative tracking-timeline pb-4">
                                        <div class="timeline-track"></div>

                                        @foreach ($orderStatuses as $index => $orderStatus)
                                            <div
                                                class="mb-5 d-flex align-items-center timeline-item {{ $index + 1 <= $detailOrder->status_id ? 'active' : '' }}">
                                                <div
                                                    class="timeline-point {{ $index + 1 <= $detailOrder->status_id ? 'point-success' : '' }}">
                                                    <i class="fas fa-check text-white"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <h6 class="timeline-title mb-0">{{ $orderStatus->name }}</h6>
                                                    <p class="timeline-date mb-0">
                                                        {{ $index + 1 <= $detailOrder->status_id ? \Carbon\Carbon::parse($detailOrder->updated_at)->format('d/m/Y H:i:s') : 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
@endsection

@push('link')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-info-order.css') }}" />
@endpush
