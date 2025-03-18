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
                                    <h5 class="mb-0 fw-bold">Thông tin đơn hàng #PNJ202403172498</h5>
                                    <span class="badge status-badge">Đã giao hàng</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <p class="text-muted mb-1">Ngày đặt hàng</p>
                                            <p class="fw-bold mb-0">15/03/2025</p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <p class="text-muted mb-1">Phương thức thanh toán</p>
                                            <p class="fw-bold mb-0">Thanh toán bằng thẻ</p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <p class="text-muted mb-1">Tổng giá trị</p>
                                            <p class="fw-bold mb-0 price-highlight">5.990.000 ₫</p>
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
                                            <p class="fw-bold mb-0">Nguyễn Văn A</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <p class="text-muted mb-1">Số điện thoại</p>
                                            <p class="fw-bold mb-0">098 765 4321</p>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <p class="text-muted mb-1">Địa chỉ giao hàng</p>
                                            <p class="fw-bold mb-0">123 Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ
                                                Chí Minh</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <p class="text-muted mb-1">Phương thức vận chuyển</p>
                                            <p class="fw-bold mb-0">Giao hàng nhanh</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <p class="text-muted mb-1">Ngày giao hàng</p>
                                            <p class="fw-bold mb-0">17/03/2025</p>
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
                                                <tr>
                                                    <td>
                                                        <div class="product-image-container m-auto">
                                                            <img src="https://via.placeholder.com/80" alt="Sản phẩm"
                                                                class="product-image ">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="product-name-container">
                                                            <h6 class="product-name mb-1">Nhẫn Kim cương Vàng 18K PNJ
                                                                DD00W000123</h6>
                                                            <p class="product-variant mb-0">Loại: Nhẫn | Màu sắc: Vàng |
                                                                Size: 15</p>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">1</td>
                                                    <td>5.990.000 ₫</td>
                                                    <td class="fw-bold price-highlight">5.990.000 ₫</td>
                                                </tr>
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
                                            <div class="amount">5.990.000 ₫</div>
                                        </div>

                                        <div class="info-row">
                                            <div class="label-group">
                                                <i class="fas fa-truck text-muted"></i>
                                                <span>Phí vận chuyển</span>
                                            </div>
                                            <div class="amount">
                                                <span class="shipping-badge">Miễn phí</span>
                                            </div>
                                        </div>

                                        <div class="info-row">
                                            <div class="label-group">
                                                <i class="fas fa-tags text-muted"></i>
                                                <span>Giảm giá</span>
                                            </div>
                                            <div class="amount text-danger">- 0 ₫</div>
                                        </div>

                                        <div class="info-row">
                                            <div class="label-group">
                                                <i class="fas fa-money-bill text-muted"></i>
                                                <span>Phương thức thanh toán</span>
                                            </div>
                                            <div class="amount">
                                                <span class="payment-method-badge">COD</span>
                                            </div>
                                        </div>

                                        <div class="info-row total">
                                            <div class="label-group">
                                                <i class="fas fa-coins text-muted"></i>
                                                <span>Tổng thanh toán</span>
                                            </div>
                                            <div class="amount price-highlight">5.990.000 ₫</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nút tác vụ -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="#" class="btn btn-back">
                                    <i class="fas fa-arrow-left me-2"></i>Quay lại lịch sử đơn hàng
                                </a>
                                <div>
                                    <button class="btn btn-outline-luxury me-2">
                                        <i class="fas fa-print me-2"></i>In đơn hàng
                                    </button>
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

                                        <div class="timeline-item">
                                            <div class="timeline-point point-success">
                                                <i class="fas fa-check text-white"></i>
                                            </div>
                                            <div class="timeline-content">
                                                <h6 class="timeline-title mb-1">Đã giao hàng</h6>
                                                <p class="timeline-date mb-0">17/03/2025 - 10:30</p>
                                                <p class="timeline-desc mb-3">Đơn hàng đã được giao đến địa chỉ người nhận.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div class="timeline-point point-success">
                                                <i class="fas fa-check text-white"></i>
                                            </div>
                                            <div class="timeline-content">
                                                <h6 class="timeline-title mb-1">Đang vận chuyển</h6>
                                                <p class="timeline-date mb-0">16/03/2025 - 08:45</p>
                                                <p class="timeline-desc mb-3">Đơn hàng đang được vận chuyển đến địa chỉ
                                                    người nhận.</p>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div class="timeline-point point-success">
                                                <i class="fas fa-check text-white"></i>
                                            </div>
                                            <div class="timeline-content">
                                                <h6 class="timeline-title mb-1">Đã xác nhận</h6>
                                                <p class="timeline-date mb-0">15/03/2025 - 14:20</p>
                                                <p class="timeline-desc mb-3">Đơn hàng của bạn đã được xác nhận và đang
                                                    chuẩn bị giao hàng.</p>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div class="timeline-point point-success">
                                                <i class="fas fa-check text-white"></i>
                                            </div>
                                            <div class="timeline-content">
                                                <h6 class="timeline-title mb-1">Đặt hàng thành công</h6>
                                                <p class="timeline-date mb-0">15/03/2025 - 09:15</p>
                                                <p class="timeline-desc mb-0">Đơn hàng của bạn đã được đặt thành công.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Đánh giá sản phẩm -->
                            <div class="card luxury-card mt-4">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0 fw-bold">Đánh giá sản phẩm</h5>
                                </div>
                                <div class="card-body">
                                    <div class="text-center py-4">
                                        <img src="https://via.placeholder.com/80" alt="Sản phẩm"
                                            class="mb-3 review-product-image">
                                        <h6 class="product-name mb-3">Nhẫn Kim cương Vàng 18K PNJ DD00W000123</h6>
                                        <div class="rating mb-3">
                                            <i class="fas fa-star star-icon"></i>
                                            <i class="fas fa-star star-icon"></i>
                                            <i class="fas fa-star star-icon"></i>
                                            <i class="fas fa-star star-icon"></i>
                                            <i class="fas fa-star star-icon"></i>
                                        </div>
                                        <button class="btn btn-luxury-outline mt-2">Đánh giá sản phẩm</button>
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
