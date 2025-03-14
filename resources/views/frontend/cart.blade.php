@extends('frontend.layouts.app')

@section('title', 'Trang chủ PNJ ')
@section('content')
    @include('frontend.layouts.include.header')
    <main id="main">
        <section id="main-cart">
            <div class="container mt-5">
                @if ($dataCarts->isNotEmpty())
                    <div class="row gap-3">
                        <div class="col-md-7 flex-grow-1">
                            <div class="cart main-cart shadow-sm p-2 rounded">
                                <div class="cart-header mb-3 d-flex align-items-center justify-content-between p-2">
                                    <h4 class="m-0 d-flex align-items-center gap-2 text-secondary">
                                        <span><i class="fa-solid fa-bag-shopping"></i></span>
                                        <span>GIỎ HÀNG CỦA BẠN</span>
                                    </h4>
                                    <a href="{{ route('client.home') }}"
                                        class="text-decoration-none text-primary d-flex align-items-center gap-2">
                                        <i class="fas fa-arrow-left"></i>
                                        <span>Tiếp tục mua hàng</span>
                                    </a>
                                </div>

                                <div class="cart-controls d-flex align-items-center justify-content-between mb-3 px-2">
                                    <div class="cart-select-all d-flex align-items-center">
                                        <input class="form-check-input me-3" type="checkbox" id="selectAll" />
                                        <p>Tất cả <span>({{ count($dataCarts) . ' sản phẩm' }})</span></p>
                                    </div>
                                    <form action="{{ route('client.cart.deleteAll') }}" method="POST" id="deleteAllForm"
                                        style="display: none;">
                                        @csrf
                                        <input type="hidden" name="cart_ids" id="cartIdsInput">
                                    </form>
                                    <button class="remove-all btn btn-outline-secondary" disabled>
                                        <span class="me-2">Xóa tất cả</span>
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </div>
                                <!-- Sản phẩm  -->
                                @foreach ($dataCarts as $cart)
                                    <div
                                        class="cart-item d-flex align-items-center justify-content-between border rounded-2 px-2 mb-3">
                                        <div
                                            class="cart-item-left d-flex align-items-center justify-content-between flex-grow-1 py-2">
                                            <div class="d-flex align-items-center">
                                                <input class="form-check-input me-3 cart-item-checkbox" type="checkbox"
                                                    data-id="{{ $cart->id }}" />
                                                <div class="cart-item-info d-flex align-items-center">
                                                    <div class="cart-item-image">
                                                        <img
                                                            src="{{ Storage::url($cart->variant->product->product_image) }}" />
                                                    </div>
                                                    <div class="cart-item-details ms-2">
                                                        <p class="mb-2">
                                                            {{ $cart->variant->product->product_name }}
                                                        </p>
                                                        <div class="d-flex align-items-center gap-3">
                                                            @if ($cart->variant->attribute->attributegroups->name == 'Size')
                                                                <select name="size" class="form-select size-select"
                                                                    data-cart-id="{{ $cart->id }}"
                                                                    data-product-id="{{ $cart->variant->product_id }}">
                                                                    @foreach ($attributes as $attributeValue)
                                                                        @php
                                                                            $isSelected =
                                                                                $cart->variant->attribute->id ==
                                                                                $attributeValue->id;
                                                                            $isDisabled =
                                                                                !$isSelected &&
                                                                                in_array(
                                                                                    $attributeValue->id,
                                                                                    $selectedSizes[
                                                                                        $cart->variant->product_id
                                                                                    ] ?? [],
                                                                                );
                                                                        @endphp
                                                                        <option value="{{ $attributeValue->id }}"
                                                                            @selected($isSelected)
                                                                            @disabled($isDisabled)>
                                                                            {{ $attributeValue->name }}
                                                                            @if ($isDisabled)
                                                                                (Đã chọn)
                                                                            @endif
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                            <span
                                                                class="text-secondary fw-bold mb-0">{{ formatPrice($cart->variant->price_variant * $cart->quantity) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-item-quantity d-flex align-items-center border rounded">
                                                <button type="button" class="quantity-btn minus"
                                                    data-cart-id="{{ $cart->id }}">-</button>
                                                <input type="number" class="quantity-input" value="{{ $cart->quantity }}"
                                                    min="1" max="3" readonly
                                                    data-cart-id="{{ $cart->id }}" />
                                                <button type="button" class="quantity-btn plus"
                                                    data-cart-id="{{ $cart->id }}">+</button>
                                            </div>
                                        </div>
                                        <div class="cart-right flex-grow-1 d-flex justify-content-end">
                                            <form action="{{ route('client.cart.delete') }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                                <button type="submit" class="btn btn-outline-secondary delete-item"
                                                    disabled>
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="col-md-4 border rounded position-sticky py-3">
                            <div class="cart-summary px-1">
                                <div class="d-flex justify-content-between">
                                    <span>Tạm tính:</span>
                                    <span id="subtotal">0đ</span>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <span>Chi phí vận chuyển:</span>
                                    <span>0đ</span>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between fw-bold text-primary">
                                    <span>Tổng cộng:</span>
                                    <span id="total">0đ</span>
                                </div>
                            </div>
                            <form action="{{ route('client.order.checkout') }}" method="POST" id="checkoutForm">
                                @csrf
                                <input type="hidden" name="selected_cart_items" id="selectedCartItems">
                                <button type="submit" class="btn btn-primary w-100 mt-3" id="checkoutButton" disabled>
                                    Tiến hành thanh toán
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="cart-empty text-center">
                        <img src="{{ asset('frontend/image/empty_product_line.png') }}" alt="Giỏ hàng trống">
                        <p class="text-muited p-3">Giỏ hàng của bạn đang trống</p>
                        <a href="{{ route('client.home') }}" class="mt-3 btn btn-primary">Tiếp tục mua sắm</a>
                    </div>
                @endif
            </div>
        </section>
    </main>
    @include('frontend.layouts.include.footer')
@endsection

@push('link')
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('script')
    <script>
        var storageUrl = "{{ Storage::url('') }}";
    </script>
    <script src="{{ asset('frontend/js/helper.js') }}"></script>
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
@endpush
