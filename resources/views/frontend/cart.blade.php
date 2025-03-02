@extends('frontend.layouts.app')

@section('title', 'Trang chủ PNJ ')
@section('content')
    <main id="main">
        <section id="main-cart">
            <div class="container mt-5">
                <div class="row gap-3">
                    <div class="col-md-7 flex-grow-1">
                        <div class="cart main-cart shadow-sm p-2 rounded">
                            <div class="cart-header mb-3 d-flex align-items-center justify-content-between p-2">
                                <h4 class="m-0 d-flex align-items-center gap-2 text-secondary">
                                    <span><i class="fa-solid fa-bag-shopping"></i></span>
                                    <span>GIỎ HÀNG CỦA BẠN</span>
                                </h4>
                                <a href="#" class="text-decoration-none text-primary d-flex align-items-center gap-2">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Tiếp tục mua hàng</span>
                                </a>
                            </div>

                            <div class="cart-controls d-flex align-items-center justify-content-between mb-3 px-2">
                                <div class="cart-select-all d-flex align-items-center">
                                    <input class="form-check-input me-3" type="checkbox" />
                                    <p>Tất cả <span>(2 sản phẩm)</span></p>
                                </div>
                                <button class="remove-all btn btn-outline-secondary">
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
                                            <input class="form-check-input me-3" type="checkbox" />
                                            <div class="cart-item-info d-flex align-items-center">
                                                <div class="cart-item-image">
                                                    <img src="{{ Storage::url($cart->variant->product->product_image) }}" />
                                                </div>
                                                <div class="cart-item-details ms-2">
                                                    <p class="mb-2">
                                                        {{ $cart->variant->product->product_name }}
                                                    </p>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <select name="" id="" class="form-select">
                                                            @foreach ($attributes as $attributeValue)
                                                                <option @selected($cart->variant->attribute->id == $attributeValue->id)
                                                                    value="{{ $attributeValue->id }}">
                                                                    {{ $attributeValue->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span
                                                            class="text-secondary fw-bold mb-0">{{ formatPrice($cart->variant->price_variant) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item-quantity d-flex align-items-center border rounded">
                                            <button>-</button>
                                            <input type="number" value="{{ $cart->quantity }}" min="1" readonly />
                                            <button>+</button>
                                        </div>
                                    </div>
                                    <div class="cart-right flex-grow-1 d-flex justify-content-end">
                                        <button class="btn btn-outline-secondary" disabled>
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                            <div class="card-footer mt-3">
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    <span class="me-2">Quay lại</span>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 border rounded position-sticky py-3">
                        <div class="cart-summary px-1">
                            <div class="d-flex justify-content-between">
                                <span>Tạm tính:</span>
                                <span>2,110,000₫</span>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <span>Chi phí vận chuyển:</span>
                                <span>Miễn phí</span>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between fw-bold text-primary">
                                <span>Tổng cộng:</span>
                                <span>2,110,000₫</span>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 mt-3">
                            Tiến hàng thanh toán
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('link')
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}" />
@endpush

@push('script')
    <script>
        var storageUrl = "{{ Storage::url('') }}";
    </script>
    <script src="{{ asset('frontend/js/helper.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js/cart.js') }}"></script> --}}
@endpush
