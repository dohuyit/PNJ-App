@extends('frontend.layouts.app')

@section('title', 'Thông tin khách hàng')

@section('content')
    <div class="container-fluid">
        <div class="row g-5">
            @include('frontend.layouts.include.aside')
            <main id="main" class="col-md-10">
                @include('frontend.layouts.include.nav')
                <div class="main-content">
                    <section id="group-infomation-user">
                        <div class="content-header">
                            <div class="container-fluid">
                                <h2 class="fs-5 py-2">
                                    <span>Trang chủ</span>
                                    <span>/</span>
                                    <span>Thông tin tài khoản</span>
                                </h2>
                            </div>
                        </div>
                        <div class="content">
                            <div class="container-fluid shadow-md p-4">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-4">Mã giảm giá của tôi</h4>
                                        <ul class="nav nav-pills mb-4" id="voucherTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="available-tab" data-bs-toggle="pill"
                                                    data-bs-target="#available" type="button" role="tab">
                                                    Có thể sử dụng (4)
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="used-tab" data-bs-toggle="pill"
                                                    data-bs-target="#used" type="button" role="tab">
                                                    Đã sử dụng (2)
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="expired-tab" data-bs-toggle="pill"
                                                    data-bs-target="#expired" type="button" role="tab">
                                                    Đã hết hạn (1)
                                                </button>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="voucherTabContent">
                                            <!-- Vouchers available -->
                                            <div class="tab-pane fade show active" id="available" role="tabpanel">
                                                <div class="row g-4">
                                                    <!-- Voucher 1 -->
                                                    <div class="col-md-6">
                                                        <div class="voucher-card shadow-md">
                                                            <div class="row g-0">
                                                                <div
                                                                    class="col-4 voucher-left p-3 d-flex align-items-center justify-content-center">
                                                                    <div class="text-center">
                                                                        <h3 class="fw-bold mb-0">20%</h3>
                                                                        <p class="mb-0">GIẢM GIÁ</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8 voucher-right p-3">
                                                                    <span class="voucher-badge badge bg-success">Mới</span>
                                                                    <h5 class="card-title">Giảm 20% cho trang sức vàng</h5>
                                                                    <p class="card-text small mb-1">Mã:
                                                                        <strong>GOLD20MAR</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Đơn tối thiểu:
                                                                        <strong>5.000.000đ</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Hạn sử dụng:
                                                                        <strong>31/03/2025</strong>
                                                                    </p>
                                                                    <button class="btn btn-sm btn-outline-dark mt-2">Sử
                                                                        dụng ngay</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Voucher 2 -->
                                                    <div class="col-md-6">
                                                        <div class="voucher-card shadow-md">
                                                            <div class="row g-0">
                                                                <div
                                                                    class="col-4 voucher-left p-3 d-flex align-items-center justify-content-center">
                                                                    <div class="text-center">
                                                                        <h3 class="fw-bold mb-0">500K</h3>
                                                                        <p class="mb-0">GIẢM GIÁ</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8 voucher-right p-3">
                                                                    <h5 class="card-title">Giảm 500.000đ cho nhẫn cưới</h5>
                                                                    <p class="card-text small mb-1">Mã:
                                                                        <strong>WEDDING500</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Đơn tối thiểu:
                                                                        <strong>10.000.000đ</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Hạn sử dụng:
                                                                        <strong>15/04/2025</strong>
                                                                    </p>
                                                                    <button class="btn btn-sm btn-outline-dark mt-2">Sử
                                                                        dụng ngay</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Voucher 3 -->
                                                    <div class="col-md-6">
                                                        <div class="voucher-card shadow-md">
                                                            <div class="row g-0">
                                                                <div
                                                                    class="col-4 voucher-left p-3 d-flex align-items-center justify-content-center">
                                                                    <div class="text-center">
                                                                        <h3 class="fw-bold mb-0">15%</h3>
                                                                        <p class="mb-0">GIẢM GIÁ</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8 voucher-right p-3">
                                                                    <span
                                                                        class="voucher-badge badge bg-warning text-dark">Sắp
                                                                        hết hạn</span>
                                                                    <h5 class="card-title">Giảm 15% cho trang sức bạc</h5>
                                                                    <p class="card-text small mb-1">Mã:
                                                                        <strong>SILVER15</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Đơn tối thiểu:
                                                                        <strong>1.000.000đ</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Hạn sử dụng:
                                                                        <strong>20/03/2025</strong>
                                                                    </p>
                                                                    <button class="btn btn-sm btn-outline-dark mt-2">Sử
                                                                        dụng ngay</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Voucher 4 -->
                                                    <div class="col-md-6">
                                                        <div class="voucher-card shadow-md">
                                                            <div class="row g-0">
                                                                <div
                                                                    class="col-4 voucher-left p-3 d-flex align-items-center justify-content-center">
                                                                    <div class="text-center text-white">
                                                                        <h3 class="fw-bold mb-0">10%</h3>
                                                                        <p class="mb-0">GIẢM GIÁ</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8 voucher-right p-3">
                                                                    <h5 class="card-title">Giảm 10% cho trang sức kim cương
                                                                    </h5>
                                                                    <p class="card-text small mb-1">Mã:
                                                                        <strong>DIAMOND10</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Đơn tối thiểu:
                                                                        <strong>20.000.000đ</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Hạn sử dụng:
                                                                        <strong>30/04/2025</strong>
                                                                    </p>
                                                                    <button class="btn btn-sm btn-outline-dark mt-2">Sử
                                                                        dụng ngay</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Used Vouchers -->
                                            <div class="tab-pane fade" id="used" role="tabpanel">
                                                <div class="row g-4">
                                                    <!-- Used Voucher 1 -->
                                                    <div class="col-md-6">
                                                        <div class="voucher-card shadow-md">
                                                            <div class="row g-0">
                                                                <div
                                                                    class="col-4 voucher-left p-3 d-flex align-items-center justify-content-center">
                                                                    <div class="text-center text-white">
                                                                        <h3 class="fw-bold mb-0">30%</h3>
                                                                        <p class="mb-0">GIẢM GIÁ</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8 voucher-right p-3">
                                                                    <span class="voucher-badge badge bg-secondary">Đã sử
                                                                        dụng</span>
                                                                    <h5 class="card-title">Giảm 30% cho nhẫn bạc</h5>
                                                                    <p class="card-text small mb-1">Mã:
                                                                        <strong>SILVER30</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Đã sử dụng:
                                                                        <strong>12/02/2025</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Đơn hàng:
                                                                        <strong>#35670</strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Used Voucher 2 -->
                                                    <div class="col-md-6">
                                                        <div class="voucher-card shadow-md">
                                                            <div class="row g-0">
                                                                <div
                                                                    class="col-4 voucher-left p-3 d-flex align-items-center justify-content-center">
                                                                    <div class="text-center text-white">
                                                                        <h3 class="fw-bold mb-0">100K</h3>
                                                                        <p class="mb-0">GIẢM GIÁ</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8 voucher-right p-3">
                                                                    <span class="voucher-badge badge bg-secondary">Đã sử
                                                                        dụng</span>
                                                                    <h5 class="card-title">Giảm 100.000đ không điều kiện
                                                                    </h5>
                                                                    <p class="card-text small mb-1">Mã:
                                                                        <strong>WELCOME100</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Đã sử dụng:
                                                                        <strong>01/03/2025</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Đơn hàng:
                                                                        <strong>#36421</strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Expired Vouchers -->
                                            <div class="tab-pane fade" id="expired" role="tabpanel">
                                                <div class="row g-4">
                                                    <!-- Expired Voucher -->
                                                    <div class="col-md-6">
                                                        <div class="voucher-card shadow-md expired">
                                                            <div class="row g-0">
                                                                <div
                                                                    class="col-4 voucher-left p-3 d-flex align-items-center justify-content-center">
                                                                    <div class="text-center text-white">
                                                                        <h3 class="fw-bold mb-0">25%</h3>
                                                                        <p class="mb-0">GIẢM GIÁ</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8 voucher-right p-3">
                                                                    <span class="voucher-badge badge bg-danger">Hết
                                                                        hạn</span>
                                                                    <h5 class="card-title">Giảm 25% cho mua hàng ngày sinh
                                                                        nhật</h5>
                                                                    <p class="card-text small mb-1">Mã:
                                                                        <strong>BIRTHDAY25</strong>
                                                                    </p>
                                                                    <p class="card-text small mb-1">Hết hạn:
                                                                        <strong>01/03/2025</strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Voucher FAQ -->
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h5>Câu hỏi thường gặp</h5>
                                        <div class="accordion mt-3" id="accordionFAQ">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                                        Làm thế nào để sử dụng mã giảm giá?
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFAQ">
                                                    <div class="accordion-body">
                                                        Bạn chỉ cần nhấn vào nút "Sử dụng ngay" và hệ thống sẽ tự động áp
                                                        dụng mã giảm giá cho đơn hàng của bạn. Hoặc bạn có thể sao chép mã
                                                        và nhập vào ô "Mã giảm giá" trong trang thanh toán.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                                        Tại sao mã giảm giá của tôi không được áp dụng?
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFAQ">
                                                    <div class="accordion-body">
                                                        Mã giảm giá có thể không được áp dụng vì một số lý do: đơn hàng của
                                                        bạn không đạt giá trị tối thiểu, sản phẩm không nằm trong danh mục
                                                        được áp dụng, hoặc mã đã hết hạn. Vui lòng kiểm tra điều kiện áp
                                                        dụng của mã giảm giá.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                                        Tôi có thể sử dụng nhiều mã giảm giá cho một đơn hàng không?
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFAQ">
                                                    <div class="accordion-body">
                                                        Không, mỗi đơn hàng chỉ có thể áp dụng một mã giảm giá. Hãy chọn mã
                                                        có giá trị giảm cao nhất để tối ưu hóa lợi ích của bạn.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Special Banner -->
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="card border-0 bg-light">
                                            <div class="card-body p-4">
                                                <div class="row align-items-center">
                                                    <div class="col-md-8">
                                                        <h5 class="mb-2">Giảm thêm 10% cho đơn hàng đầu tiên</h5>
                                                        <p class="mb-0">Đăng ký nhận bản tin để nhận ngay mã giảm giá 10%
                                                            cho đơn hàng đầu tiên của bạn.</p>
                                                    </div>
                                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                                        <button class="btn btn-primary">Đăng ký ngay</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.container-fluid -->
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
