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
                    <section id="content">
                        <!-- Đơn hàng hiện tại -->
                        <div class="container-fluid">
                            <div class="order-summary mb-4">
                                <!-- Lọc và tìm kiếm -->
                                <div class="row g-3 mb-4 align-items-center">
                                    <div class="col-md-4">
                                        <select class="form-select form-select-sm border-0 shadow-md bg-light">
                                            <option selected>Trạng thái đơn hàng</option>
                                            <option>Đang xử lý</option>
                                            <option>Đang vận chuyển</option>
                                            <option>Đã giao hàng</option>
                                            <option>Đã hủy</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select form-select-sm border-0 shadow-md bg-light">
                                            <option selected>Thời gian</option>
                                            <option>7 ngày qua</option>
                                            <option>30 ngày qua</option>
                                            <option>3 tháng qua</option>
                                            <option>Tất cả</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group input-group-sm d-flex">
                                            <input type="text" class="form-control border-0 shadow-md"
                                                placeholder="Tìm kiếm theo mã đơn hàng...">
                                            <button class="btn btn-primary shadow-md" type="button">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Danh sách đơn hàng -->
                                <div class="order-list">
                                    @if ($listOrders)
                                        @foreach ($listOrders as $order)
                                            <div class="card border-0 shadow-md mb-4 rounded-3 overflow-hidden">
                                                <div
                                                    class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                                                    <div>
                                                        <span class="text-muted me-3">{{ $order->order_code }}</span>
                                                        <span
                                                            class="badge bg-warning text-dark rounded-pill px-3">{{ $order->paymentMethod->name }}</span>
                                                    </div>
                                                    <div class="text-end">
                                                        <span
                                                            class="text-muted">{{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</span>

                                                    </div>
                                                </div>

                                                <div class="card-body p-4">
                                                    @foreach ($order->orderItems as $key => $orderItem)
                                                        <div class="row g-3 mb-2">
                                                            <div class="col-md-1">
                                                                <div class="product-img text-center w-100">
                                                                    <img src="{{ Storage::url($orderItem->variant->product->product_image) }}"
                                                                        alt="Product" class="w-100">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-11">
                                                                <h5 class="product-title fw-bold mb-2">
                                                                    {{ $orderItem->variant->product->product_name }}
                                                                </h5>
                                                                <p class="product-desc text-muted mb-2">
                                                                    {{ $orderItem->variant->product->jewelryLine->name }}
                                                                </p>
                                                                <div class="product-meta">
                                                                    @if ($orderItem->variant->attribute->attributegroups->name == 'Size')
                                                                        <span class="me-3">Size:
                                                                            {{ $orderItem->variant->attribute->name }}</span>
                                                                    @endif
                                                                    <span>SL: {{ $orderItem->quantity }}</span>
                                                                </div>
                                                                <div class="product-price mt-2">
                                                                    <h5 class="text-primary fw-bold">
                                                                        {{ formatPrice($orderItem->unit_price) }}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="card-footer bg-white text-end border-top py-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <a href="#" class="btn btn-outline-primary btn-sm">
                                                                <i class="fas fa-info-circle"></i>
                                                                <span class="ms-1">Chi tiết đơn hàng</span>
                                                            </a>
                                                            <a href="#" class="btn btn-outline-danger btn-sm">
                                                                <i class="fa-solid fa-ban"></i>
                                                                <span class="ms-1">Hủy đơn hàng</span>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div>
                                                                <span class="me-3">Tổng tiền:</span>
                                                                <span class="fw-bold fs-5 text-primary">25.500.000₫</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-muted">Bạn chưa có đơn hàng nào !</p>
                                    @endif
                                </div>

                                <div class="pagination-product mt-4">
                                    <ul class="pagination justify-content-center gap-2">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Thống kê đơn hàng -->
                            <div class="order-statistics mb-5">
                                <h3 class="fs-5 fw-bold my-3 text-primary">Thống kê đơn hàng</h3>
                                <div class="row g-4">
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-md rounded-3 h-100">
                                            <div class="card-body text-center p-4">
                                                <div
                                                    class="icon-wrapper bg-primary bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                                                    <i class="fas fa-shopping-cart text-primary fs-4"></i>
                                                </div>
                                                <h5 class="counter mb-1">8</h5>
                                                <p class="text-muted mb-0">Tổng đơn hàng</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-md rounded-3 h-100">
                                            <div class="card-body text-center p-4">
                                                <div
                                                    class="icon-wrapper bg-success bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                                                    <i class="fas fa-check-circle text-success fs-4"></i>
                                                </div>
                                                <h5 class="counter mb-1">5</h5>
                                                <p class="text-muted mb-0">Đã giao thành công</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-md rounded-3 h-100">
                                            <div class="card-body text-center p-4">
                                                <div
                                                    class="icon-wrapper bg-warning bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                                                    <i class="fas fa-truck text-warning fs-4"></i>
                                                </div>
                                                <h5 class="counter mb-1">2</h5>
                                                <p class="text-muted mb-0">Đang vận chuyển</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-md rounded-3 h-100">
                                            <div class="card-body text-center p-4">
                                                <div
                                                    class="icon-wrapper bg-info bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                                                    <i class="fas fa-spinner text-info fs-4"></i>
                                                </div>
                                                <h5 class="counter mb-1">1</h5>
                                                <p class="text-muted mb-0">Đang xử lý</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sản phẩm đã mua gần đây -->
                            <div class="recent-purchases mb-5">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="fs-5 fw-bold text-primary my-3">Sản phẩm đã mua gần đây</h3>
                                    <a href="#" class="text-decoration-none text-primary">Xem tất cả <i
                                            class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                                <div class="row g-4">
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-md rounded-3 h-100 product-card">
                                            <div class="card-body p-3">
                                                <div class="product-image text-center mb-3">
                                                    <img src="./image/products/pro1.png" alt="Product"
                                                        class="img-fluid rounded-pill">
                                                </div>
                                                <h5 class="product-title fw-bold mb-1">Đồng hồ Luxury</h5>
                                                <p class="text-muted small mb-2">Swiss Made | PNJ Luxury Collection
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-primary fw-bold">45.900.000₫</span>
                                                    <button class="btn btn-sm btn-outline-primary">Mua
                                                        lại</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-md rounded-3 h-100 product-card">
                                            <div class="card-body p-3">
                                                <div class="product-image text-center mb-3">
                                                    <img src="./image/products/pro1.png" alt="Product"
                                                        class="img-fluid rounded-pill">
                                                </div>
                                                <h5 class="product-title fw-bold mb-1">Đồng hồ Luxury</h5>
                                                <p class="text-muted small mb-2">Swiss Made | PNJ Luxury Collection
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-primary fw-bold">45.900.000₫</span>
                                                    <button class="btn btn-sm btn-outline-primary">Mua
                                                        lại</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-md rounded-3 h-100 product-card">
                                            <div class="card-body p-3">
                                                <div class="product-image text-center mb-3">
                                                    <img src="./image/products/pro1.png" alt="Product"
                                                        class="img-fluid rounded-pill">
                                                </div>
                                                <h5 class="product-title fw-bold mb-1">Đồng hồ Luxury</h5>
                                                <p class="text-muted small mb-2">Swiss Made | PNJ Luxury Collection
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-primary fw-bold">45.900.000₫</span>
                                                    <button class="btn btn-sm btn-outline-primary">Mua
                                                        lại</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card border-0 shadow-md rounded-3 h-100 product-card">
                                            <div class="card-body p-3">
                                                <div class="product-image text-center mb-3">
                                                    <img src="./image/products/pro1.png" alt="Product"
                                                        class="img-fluid rounded-pill">
                                                </div>
                                                <h5 class="product-title fw-bold mb-1">Đồng hồ Luxury</h5>
                                                <p class="text-muted small mb-2">Swiss Made | PNJ Luxury Collection
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-primary fw-bold">45.900.000₫</span>
                                                    <button class="btn btn-sm btn-outline-primary">Mua
                                                        lại</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dịch vụ khách hàng -->
                            <div class="customer-service mb-5">
                                <h3 class="fs-5 fw-bold mb-3 text-primary">Dịch vụ khách hàng</h3>
                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <div class="card border-0 shadow-md rounded-3 h-100">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div
                                                        class="icon-wrapper bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                                        <i class="fas fa-gem text-primary fs-4"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-2">Bảo hành & Chăm sóc</h5>
                                                        <p class="text-muted mb-0">Dịch vụ chăm sóc và bảo hành sản
                                                            phẩm trang sức mọi lúc, mọi nơi</p>
                                                        <a href="#"
                                                            class="text-decoration-none mt-2 d-inline-block">Tìm
                                                            hiểu thêm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-0 shadow-md rounded-3 h-100">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div
                                                        class="icon-wrapper bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                                        <i class="fas fa-exchange-alt text-primary fs-4"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-2">Đổi trả & Hoàn tiền</h5>
                                                        <p class="text-muted mb-0">Chính sách đổi trả linh hoạt và
                                                            hoàn tiền nhanh chóng</p>
                                                        <a href="#"
                                                            class="text-decoration-none mt-2 d-inline-block">Tìm
                                                            hiểu thêm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-0 shadow-md rounded-3 h-100">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div
                                                        class="icon-wrapper bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                                        <i class="fas fa-headset text-primary fs-4"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-2">Hỗ trợ khách hàng</h5>
                                                        <p class="text-muted mb-0">Đội ngũ tư vấn viên chuyên nghiệp
                                                            luôn sẵn sàng hỗ trợ</p>
                                                        <a href="#"
                                                            class="text-decoration-none mt-2 d-inline-block">Liên hệ
                                                            ngay</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-order.css') }}" />
@endpush
