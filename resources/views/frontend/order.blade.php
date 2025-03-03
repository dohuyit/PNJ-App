@extends('frontend.layouts.app')
@section('title', 'Trang thanh toán sản phẩm PNJ ')

@section('content')
    <main id="main">
        <section id="main-order">
            <div class="container my-5">
                <div class="row">
                    <!-- Thông tin khách hàng -->
                    <div class="col-md-7">
                        <div class="header-order d-flex align-items-center justify-content-between">
                            <img src="{{ asset('frontend/image/pnj.com.vn.png') }}" alt="PNJ Logo" class="mb-2"
                                width="120" />
                            <a href="{{ route('client.home') }}"
                                class="text-decoration-none text-primary d-flex align-items-center gap-2">
                                <i class="fas fa-arrow-left"></i>
                                <span>Tiếp tục mua hàng</span>
                            </a>
                        </div>

                        <form>
                            <div class="customer-info mb-5">
                                <div class="title-group">
                                    <h3 class="fw-bold my-3">Thông tin giao hàng</h3>
                                </div>

                                <div class="content-group row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Họ và Tên</label>
                                        <input type="text" class="form-control" placeholder="Họ và tên *" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="Email" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" placeholder="Số điện thoại *" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Ngày sinh</label>
                                        <input type="date" class="form-control" placeholder="MM/DD/YY" />
                                    </div>
                                </div>
                            </div>

                            <!-- Hình thức nhận hàng -->
                            <div class="shopping-method mb-5">
                                <div class="title-group my-3">
                                    <h3 class="fw-bold">Hình thức nhận hàng</h3>
                                </div>
                                <div class="content-group">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <input class="form-check-input" type="radio" name="delivery"
                                                id="delivery-home" />
                                            <label for="delivery-home"
                                                class="radio-container d-flex align-items-center justify-content-center border py-2 gap-2 rounded-3">
                                                <div class="radio-image">
                                                    <img src="{{ asset('frontend/image/delivery-bike.svg') }}"
                                                        alt="img-radio" />
                                                </div>
                                                <div class="radio-desc">
                                                    <p class="text-primary fw-bold">
                                                        Giao hàng tận nơi
                                                    </p>
                                                    <p class="text-capitalize">Miễn phí toàn quốc</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-check-input" type="radio" name="delivery"
                                                id="delivery-store" />
                                            <label for="delivery-store"
                                                class="radio-container d-flex align-items-center justify-content-center border py-2 gap-2 rounded-3">
                                                <div class="radio-image">
                                                    <img src="{{ asset('frontend/image/store.webp') }}" alt="img-radio" />
                                                </div>
                                                <div class="radio-desc">
                                                    <p class="text-primary fw-bold">
                                                        Nhận tại cửa hàng
                                                    </p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3 mt-1">
                                        <div class="col-md-6">
                                            <label class="form-label">Tỉnh / Thành</label>
                                            <select class="form-select">
                                                <option selected>Chọn tỉnh / thành</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Quận / Huyện</label>
                                            <select class="form-select">
                                                <option selected>Chọn quận / huyện</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Phường / Xã</label>
                                            <select class="form-select">
                                                <option selected>Chọn phường / xã</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" placeholder="Địa chỉ" />
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Ghi chú</label>
                                            <textarea name="" id="" cols="30" rows="15" class="form-control"
                                                placeholder="Ghi chú đơn hàng..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Phương thức thanh toán -->
                            <div class="payment-method">
                                <h3 class="fw-bold my-3">Phương thức thanh toán</h3>
                                <div class="item-form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="payment-cod" />
                                    <label
                                        class="form-check-label px-2 py-2 rounded-2 payment-content d-flex align-items-center gap-3"
                                        for="payment-cod">
                                        <div class="payment-content-image">
                                            <img src="{{ asset('frontend/image/cod.svg') }}" alt="" />
                                        </div>
                                        <div class="payment-content-desc">
                                            <p>Thanh toán khi nhận hàng</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="item-form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="payment-vnpay"
                                        checked />
                                    <label
                                        class="form-check-label px-2 py-2 rounded-2 payment-content d-flex align-items-center gap-3"
                                        for="payment-vnpay">
                                        <div class="payment-content-image">
                                            <img src="{{ asset('frontend/image/vnpay.svg') }}" alt="" />
                                        </div>
                                        <div class="payment-content-desc">
                                            <p>Thanh toán VNPAY</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="item-form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="payment-momo" />
                                    <label
                                        class="form-check-label px-2 py-2 rounded-2 payment-content d-flex align-items-center gap-3"
                                        for="payment-momo">
                                        <div class="payment-content-image">
                                            <img src="{{ asset('frontend/image/momo.webp') }}" alt="" />
                                        </div>
                                        <div class="payment-content-desc">
                                            <p>Thanh toán MOMO</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="item-form-check">
                                    <input class="form-check-input" type="radio" name="payment"
                                        id="payment-zalopay" />
                                    <label
                                        class="form-check-label px-2 py-2 rounded-2 payment-content d-flex align-items-center gap-3"
                                        for="payment-zalopay">
                                        <div class="payment-content-image">
                                            <img src="{{ asset('frontend/image/zalo.webp') }}" alt="" />
                                        </div>
                                        <div class="payment-content-desc">
                                            <p>Thanh toán ZaloPay</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Tóm tắt đơn hàng -->
                    <div class="col-md-5">
                        <div class="accordion" id="infoOrder">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Tóm tắt đơn hàng
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#infoOrder">
                                    <div class="accordion-body">
                                        @foreach ($cartItems as $item)
                                            <div class="item-accordion d-flex align-items-center gap-3 mb-3">
                                                <div class="image">
                                                    <img src="{{ Storage::url($item->variant->product->product_image) }}"
                                                        alt="{{ $item->variant->product->product_name }}"
                                                        class="border rounded-3" />
                                                </div>
                                                <div class="content d-flex flex-column w-100">
                                                    <p class="fw-bold">
                                                        {{ $item->variant->product->product_name }}
                                                    </p>
                                                    <div class="product-details">
                                                        <span class="text-secondary">Size:
                                                            {{ $item->variant->attribute->name }}</span>
                                                    </div>
                                                    <p class="mt-auto d-flex justify-content-between fw-bold">
                                                        <span>{{ formatPrice($item->variant->price_variant * $item->quantity) }}</span>
                                                        <span>Số lượng: <strong>{{ $item->quantity }}</strong></span>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body order-sumary">
                            <hr />
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="Nhập Mã Giảm Giá" />
                                <button class="btn btn-primary">Sử dụng</button>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-0">Tạm tính</p>
                                <p class="mb-0 fw-bold text-secondary">{{ formatPrice($subTotal) }}</p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="mb-0">Phí vận chuyển</p>
                                <p class="mb-0 fw-bold text-secondary">-0đ</p>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between fw-bold">
                                <p class="mb-0">TỔNG CỘNG</p>
                                <p class="mb-0 text-secondary">{{ formatPrice($subTotal) }}</p>
                            </div>
                            <button type="reset" class="btn btn-primary w-100 mt-3">
                                Đặt hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('link')
    <link rel="stylesheet" href="{{ asset('frontend/css/order.css') }}" />
@endpush

@push('script')
    {{-- <script src="{{ asset('frontend/js/helper.js') }}"></script>
    <script src="{{ asset('frontend/js/client.js') }}"></script>
    <script src="{{ asset('frontend/js/detail.js') }}"></script> --}}
@endpush
