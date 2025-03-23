@extends('frontend.layouts.app')

@section('title', 'Mã giảm giá của tôi')

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
                                    <span>Mã giảm giá của tôi</span>
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
                                                    Có thể sử dụng ({{ $validVouchers->count() }})
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="used-tab" data-bs-toggle="pill"
                                                    data-bs-target="#used" type="button" role="tab">
                                                    Đã sử dụng ({{ $usedVouchers->count() }})
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="expired-tab" data-bs-toggle="pill"
                                                    data-bs-target="#expired" type="button" role="tab">
                                                    Đã hết hạn ({{ $expiredVouchers->count() }})
                                                </button>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="voucherTabContent">
                                            <!-- Vouchers available -->
                                            <div class="tab-pane fade show active" id="available" role="tabpanel">
                                                <div class="row g-4">
                                                    @foreach ($validVouchers as $dataItem)
                                                        <div class="col-md-6">
                                                            <div class="voucher-card shadow-md">
                                                                <div class="row g-0">
                                                                    <div
                                                                        class="col-4 voucher-left p-3 d-flex align-items-center justify-content-center">
                                                                        <div class="text-center">
                                                                            <h3 class="fw-bold mb-0">
                                                                                @if ($dataItem->voucher->is_fixed == 0)
                                                                                    {{ intval($dataItem->voucher->discount_amount) }}%
                                                                                @else
                                                                                    {{ formatPrice($dataItem->voucher->discount_amount) }}
                                                                                @endif

                                                                            </h3>
                                                                            <p class="mb-0">GIẢM GIÁ</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-8 voucher-right p-3">
                                                                        @if ($dataItem->voucher->created_at >= now()->subDays(1))
                                                                            <span
                                                                                class="voucher-badge badge bg-success">Mới</span>
                                                                        @elseif ($dataItem->voucher->end_date <= now()->addDays(2) && $dataItem->voucher->end_date > now())
                                                                            <span
                                                                                class="voucher-badge badge bg-warning text-dark">Sắp
                                                                                hết hạn</span>
                                                                        @endif


                                                                        <h5 class="card-title mb-3">
                                                                            {{ $dataItem->voucher->voucher_name }}
                                                                        </h5>
                                                                        <p class="card-text small mb-1">Mã:
                                                                            <strong>{{ $dataItem->voucher->voucher_code }}</strong>
                                                                        </p>
                                                                        <p class="card-text small mb-1">Đơn tối thiểu:
                                                                            <strong>{{ formatPrice($dataItem->voucher->min_order_value) }}</strong>
                                                                        </p>
                                                                        <p class="card-text small mb-1">Hạn sử dụng:
                                                                            <strong>{{ \Carbon\Carbon::parse($dataItem->voucher->end_date)->format('d-m-Y') }}</strong>
                                                                        </p>
                                                                        <a href="{{ route('client.home') }}"
                                                                            class="btn btn-sm btn-outline-dark mt-2">Sử
                                                                            dụng ngay</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Used Vouchers -->
                                            <div class="tab-pane fade" id="used" role="tabpanel">
                                                <div class="row g-4">
                                                    @foreach ($usedVouchers as $dataItem)
                                                        <div class="col-md-6">
                                                            <div class="voucher-card shadow-md">
                                                                <div class="row g-0">
                                                                    <div
                                                                        class="col-4 voucher-left p-3 d-flex align-items-center justify-content-center">
                                                                        <div class="text-center">
                                                                            <h3 class="fw-bold mb-0">
                                                                                @if ($dataItem->voucher->is_fixed == 0)
                                                                                    {{ intval($dataItem->voucher->discount_amount) }}%
                                                                                @else
                                                                                    {{ formatPrice($dataItem->voucher->discount_amount) }}
                                                                                @endif

                                                                            </h3>
                                                                            <p class="mb-0">GIẢM GIÁ</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-8 voucher-right p-3">
                                                                        <span class="voucher-badge badge bg-secondary">Đã sử
                                                                            dụng</span>
                                                                        <h5 class="card-title mb-3">
                                                                            {{ $dataItem->voucher->voucher_name }}
                                                                        </h5>
                                                                        <p class="card-text small mb-1">Mã:
                                                                            <strong>{{ $dataItem->voucher->voucher_code }}</strong>
                                                                        </p>
                                                                        <p class="card-text small mb-1">Đơn tối thiểu:
                                                                            <strong>{{ formatPrice($dataItem->voucher->min_order_value) }}</strong>
                                                                        </p>
                                                                        <p class="card-text small mb-1">Hạn sử dụng:
                                                                            <strong>{{ \Carbon\Carbon::parse($dataItem->voucher->end_date)->format('d-m-Y') }}</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Expired Vouchers -->
                                            <div class="tab-pane fade" id="expired" role="tabpanel">
                                                <div class="row g-4">
                                                    <!-- Expired Voucher -->
                                                    @foreach ($expiredVouchers as $dataItem)
                                                        <div class="col-md-6">
                                                            <div class="voucher-card shadow-md expired">
                                                                <div class="row g-0">
                                                                    <div
                                                                        class="col-4 voucher-left p-3 d-flex align-items-center justify-content-center">
                                                                        <div class="text-center text-white">
                                                                            <h3 class="fw-bold mb-0">
                                                                                @if ($dataItem->voucher->is_fixed == 0)
                                                                                    {{ intval($dataItem->voucher->discount_amount) }}%
                                                                                @else
                                                                                    {{ formatPrice($dataItem->voucher->discount_amount) }}
                                                                                @endif

                                                                            </h3>
                                                                            <p class="mb-0">GIẢM GIÁ</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-8 voucher-right p-3">
                                                                        <span class="voucher-badge badge bg-danger">Hết
                                                                            hạn</span>
                                                                        <h5 class="card-title">
                                                                            {{ $dataItem->voucher->voucher_name }}</h5>
                                                                        <p class="card-text small mb-1">Mã:
                                                                            <strong>{{ $dataItem->voucher->voucher_code }}</strong>
                                                                        </p>
                                                                        <p class="card-text small mb-1">Hết hạn:
                                                                            <strong>{{ \Carbon\Carbon::parse($dataItem->voucher->end_date)->format('d-m-Y') }}</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
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
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-voucher.css') }}" />
@endpush
