@extends('frontend.layouts.app')
@section('title', 'Trang thanh toán sản phẩm PNJ ')

@section('content')
    <main id="main">
        <section id="main-order">
            <form action="{{ route('client.order.process') }}" method="post">
                @csrf
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

                            <div class="customer-info mb-5">
                                <div class="title-group">
                                    <h3 class="fw-bold my-3">Thông tin giao hàng</h3>
                                </div>

                                <div class="content-group row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Họ và Tên</label>
                                        <input type="text" name="name" class="form-control" placeholder="Họ và tên *"
                                            value="{{ session('client_auth')->username }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ session('client_auth')->email }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Số điện thoại *" value="{{ session('client_auth')->phone }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Ngày sinh</label>
                                        <input type="date" name="" class="form-control" placeholder="MM/DD/YY"
                                            value="{{ session('client_auth')->birthday }}" />
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
                                            <select name="city_id" id="city" class="form-control">
                                                <option value="" hidden selected>-- Tỉnh / Thành Phố --</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}" @selected(session('client_auth')->city_id == $city->id)>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Quận / Huyện</label>
                                            <select name="district_id" id="district" class="form-control">
                                                <option value="" hidden selected>-- Quận / Huyện --</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}" @selected(session('client_auth')->district_id == $district->id)>
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Phường / Xã</label>
                                            <select name="ward_id" id="ward" class="form-control">
                                                <option value="" hidden selected>-- Xã / Phường --</option>
                                                @foreach ($wards as $ward)
                                                    <option value="{{ $ward->id }}" @selected(session('client_auth')->ward_id == $ward->id)>
                                                        {{ $ward->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" placeholder="Địa chỉ"
                                                name="address" />
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Ghi chú</label>
                                            <textarea name="note" id="" cols="30" rows="15" class="form-control"
                                                placeholder="Ghi chú đơn hàng..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Phương thức thanh toán -->
                            <div class="payment-method">
                                <h3 class="fw-bold my-3">Phương thức thanh toán</h3>
                                <div class="item-form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="payment-cod"
                                        value="1" checked />
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
                                        value="2" />
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
                                    <input class="form-check-input" type="radio" name="payment" id="payment-momo"
                                        value="3" />
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
                                    <input class="form-check-input" type="radio" name="payment" id="payment-zalopay"
                                        value="4" />
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
                        </div>

                        <!-- Tóm tắt đơn hàng -->
                        <div class="col-md-5">
                            <div class="accordion" id="infoOrder">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
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
                                                        @if ($item->variant->attribute->attributegroups->name == 'Size')
                                                            <div class="product-details">
                                                                <span class="text-secondary">Size:
                                                                    {{ $item->variant->attribute->name }}</span>
                                                            </div>
                                                        @endif
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
                                <div id="voucherMessage" class="mb-2"></div>

                                <div class="mt-2 input-group">
                                    <input type="text" name="voucher_code" id="voucher_code" class="form-control"
                                        placeholder="Nhập mã giảm giá...">
                                    <button type="button" id="applyVoucherBtn" class="btn btn-primary">Sử dụng</button>
                                </div>

                                <div id="voucherSection" class="mt-2">
                                    @if (Session::has('voucher_id'))
                                        <div class="voucher-applied">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-success">
                                                    Mã giảm giá: {{ Session::get('voucher_code') }}
                                                </span>
                                                <button type="button" id="removeVoucherBtn"
                                                    class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <hr />
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">Tạm tính</p>
                                    <p class="mb-0 fw-bold text-secondary" id="subtotal">{{ formatPrice($subTotal) }}
                                    </p>
                                </div>

                                <div class="discount-section">
                                    @if (Session::has('voucher_id'))
                                        <div class="d-flex justify-content-between mt-2">
                                            <p class="mb-0">Mã giảm giá</p>
                                            <p class="mb-0 fw-bold text-danger" id="discountAmount">
                                                - {{ formatPrice(Session::get('discount_amount', 0)) }}
                                            </p>
                                        </div>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <p class="mb-0">Phí vận chuyển</p>
                                    <p class="mb-0 fw-bold text-secondary">0đ</p>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between fw-bold">
                                    <p class="mb-0">TỔNG CỘNG</p>
                                    <p class="mb-0 text-secondary" id="finalPrice">
                                        {{ formatPrice(Session::get('final_price', $subTotal)) }}
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-3">
                                    Đặt hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>

@endsection

@push('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/order.css') }}" />
@endpush

@push('script')
    <script src="{{ asset('frontend/js/order.js') }}"></script>
@endpush
