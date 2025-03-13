@extends('frontend.layouts.app')
@section('title', 'Trang chi tiết sản phẩm PNJ ')

@section('content')
    @include('frontend.layouts.include.header')
    <main id="main" @if ($type === 'collection' && $category->name == 'OnlyYou') style="background-color: #fee9e8" @endif>
        <section class="py-2" id="title-main">
            <div class="container">
                <h2 class="d-flex align-items-center justify-content-center gap-2 m-0">
                    <a href="{{ route('client.home') }}">Trang chủ</a>
                    <span>/</span>

                    @if ($type === 'collection')
                        <span class="text-primary">Bộ sưu tập</span>
                        <span>/</span>
                    @elseif ($type === 'brand')
                        <span class="text-primary">Thương hiệu</span>
                        <span>/</span>
                    @endif

                    <span class="fw-bold text-primary">{{ $category->name }}</span>
                </h2>

            </div>
        </section>
        <section class="py-2" id="group-banners">
            <div class="container">
                <div class="body">
                    <img src="{{ Storage::url($category->banner_image) }}" alt="" class="w-100">
                </div>
            </div>
        </section>
        @if ($type === 'collection' && optional($subBannerCollectionFirst)->banner_image)
            <section class="py-2" id="group-sub-banner-first">
                <div class="container">
                    <div class="body">
                        <img src="{{ Storage::url($subBannerCollectionFirst->banner_image) }}" alt=""
                            class="w-100">
                    </div>
                </div>
            </section>
        @endif
        @if ($type === 'product-type')
            <section class="py-2" id="group-tags">
                <div class="container">
                    <div class="body d-flex justify-content-between">
                        <div class="tag-item border btn">
                            <a href="#" class="fw-bold text-primary">
                                <p>Trang sức </p>
                                <p class="text-capitalize">đính kim cương</p>
                            </a>
                        </div>
                        <div class="tag-item border btn">
                            <a href="#" class="fw-bold text-primary">
                                <p>Trang sức </p>
                                <p class="text-capitalize">đính kim cương</p>
                            </a>
                        </div>
                        <div class="tag-item border btn">
                            <a href="#" class="fw-bold text-primary">
                                <p>Trang sức </p>
                                <p class="text-capitalize">đính kim cương</p>
                            </a>
                        </div>
                        <div class="tag-item border btn">
                            <a href="#" class="fw-bold text-primary">
                                <p>Trang sức </p>
                                <p class="text-capitalize">đính kim cương</p>
                            </a>
                        </div>
                        <div class="tag-item border btn">
                            <a href="#" class="fw-bold text-primary">
                                <p>Trang sức </p>
                                <p class="text-capitalize">đính kim cương</p>
                            </a>
                        </div>
                        <div class="tag-item border btn">
                            <a href="#" class="fw-bold text-primary">
                                <p>Trang sức </p>
                                <p class="text-capitalize">đính kim cương</p>
                            </a>
                        </div>
                        <div class="tag-item border btn">
                            <a href="#" class="fw-bold text-primary">
                                <p>Trang sức </p>
                                <p class="text-capitalize">đính kim cương</p>
                            </a>
                        </div>
                        <div class="tag-item border btn">
                            <a href="#" class="fw-bold text-primary">
                                <p>Trang sức </p>
                                <p class="text-capitalize">đính kim cương</p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if ($type === 'jewelry-line')
            {{-- <section class="py-2" id="group-product-types">
                <div class="container">
                    <div class="body-swiper position-relative">
                        <div class="swiper myBannerProductType">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide card">
                                    <a href="#">
                                        <div class="card-body p-0">
                                            <img class="w-100" src="./image/y_300x300_nhan.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide card">
                                    <a href="#">
                                        <div class="card-body p-0">
                                            <img class="w-100" src="./image/y_300x300_nhan.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide card">
                                    <a href="#">
                                        <div class="card-body p-0">
                                            <img class="w-100" src="./image/y_300x300_nhan.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide card">
                                    <a href="#">
                                        <div class="card-body p-0">
                                            <img class="w-100" src="./image/y_300x300_nhan.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide card">
                                    <a href="#">
                                        <div class="card-body p-0">
                                            <img class="w-100" src="./image/y_300x300_nhan.jpg" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section> --}}
            @if ($bannerJewelryLineNew && $bannerJewelryLineFeature)
                <section class="py-2 mt-5" id="group-new-products">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ Storage::url(optional($bannerJewelryLineNew)->banner_image) }}" alt=""
                                    class="w-100">
                            </div>
                            <div class="col-md-9">
                                <div class="body-swiper px-5 position-relative text-center">
                                    <div class="swiper myNewProductJewelryLines">
                                        <div class="swiper-wrapper">
                                            @foreach ($productNew as $product)
                                                <div class="swiper-slide card">
                                                    <a href="{{ route('client.detail', $product->id) }}">
                                                        <div class="card-img position-relative">
                                                            <img src="{{ Storage::url($product->product_image) }}"
                                                                class="card-img-top" alt="" />
                                                            <img src="{{ asset('frontend/image/new-icon-3-w29.svg') }}"
                                                                class="img-sub-new" alt="" />
                                                            <img class="img-sub-fast"
                                                                src="{{ asset('frontend/image/PNJfast-Giaotrong3h.svg') }}"
                                                                alt="" />
                                                            <img class="img-sub-icon"
                                                                src="{{ asset('frontend/image/icon-tragop-2.svg') }}"
                                                                alt="" />
                                                        </div>
                                                        <div class="card-body p-2">
                                                            <h5 class="card-title">
                                                                <a
                                                                    href="{{ route('client.detail', $product->id) }}">{{ $product->product_name }}</a>
                                                            </h5>
                                                            <div
                                                                class="card-text product-price mb-2 d-flex align-items-center justify-content-center gap-2">
                                                                @if ($product->sale_price != $product->sale_price)
                                                                    <span
                                                                        class="original-price text-decoration-line-through fst-italic">{{ formatPrice($product->original_price) }}</span>
                                                                    <span
                                                                        class="sale-price">{{ formatPrice($product->sale_price) }}</span>
                                                                @else
                                                                    <span
                                                                        class="sale-price">{{ formatPrice($product->sale_price) }}</span>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="product-order-and-rating d-flex align-items-center justify-content-between">
                                                                <div class="item-rating">
                                                                    <span>
                                                                        <i class="fa-solid fa-star text-warning"></i>
                                                                    </span>
                                                                    <span>5</span>
                                                                </div>
                                                                <div class="item-order">
                                                                    <span>200+ đã bán</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- Navigation buttons -->
                                    <a href="#" class="btn btn-outline-primary mt-3">Xem thêm</a>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="py-2 mt-5" id="group-beseller">
                    <div class="container">
                        <div class="block-banner">
                            <img src="{{ Storage::url(optional($bannerJewelryLineFeature)->banner_image) }}"
                                alt="" class="w-100">
                        </div>
                        <div class="block-product mt-3">
                            <div class="row g-3">
                                @foreach ($productFeature as $product)
                                    <div class="col-md-3">
                                        <div class="card text-center">
                                            <a href="{{ route('client.detail', $product->id) }}">
                                                <div class="card-img position-relative">
                                                    <img src="{{ Storage::url($product->product_image) }}"
                                                        class="card-img-top" alt="" />
                                                    <img class="img-sub-fast"
                                                        src="{{ asset('frontend/image/PNJfast-Giaotrong3h.svg') }}"
                                                        alt="" />
                                                    <img class="img-sub-icon"
                                                        src="{{ asset('frontend/image/icon-tragop-2.svg') }}"
                                                        alt="" />
                                                </div>
                                                <div class="card-body p-2">
                                                    <h5 class="card-title">
                                                        <a
                                                            href="{{ route('client.detail', $product->id) }}">{{ $product->product_name }}</a>
                                                    </h5>
                                                    <div
                                                        class="card-text product-price mb-2 d-flex align-items-center justify-content-center gap-2">
                                                        @if ($product->sale_price != $product->sale_price)
                                                            <span
                                                                class="original-price text-decoration-line-through fst-italic">{{ formatPrice($product->original_price) }}</span>
                                                            <span
                                                                class="sale-price">{{ formatPrice($product->sale_price) }}</span>
                                                        @else
                                                            <span
                                                                class="sale-price">{{ formatPrice($product->sale_price) }}</span>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="product-order-and-rating d-flex align-items-center justify-content-between">
                                                        <div class="item-rating">
                                                            <span>
                                                                <i class="fa-solid fa-star text-warning"></i>
                                                            </span>
                                                            <span>5</span>
                                                        </div>
                                                        <div class="item-order">
                                                            <span>200+ đã bán</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endif
        @if ($type !== 'jewelry-line' || (!$bannerJewelryLineNew && !$bannerJewelryLineFeature))
            <section class="py-2" id="group-action">
                <div class="container d-flex align-items-center justify-content-between">
                    <div class="item-filter">
                        <h3>Bộ lọc</h3>
                        <div class="list-selected d-flex align-items-center gap-2 ">
                            <div class="box-selected">
                                <select class="form-select">
                                    <option value="" hidden selected>Thương hiệu</option>
                                    <option value="PNJ">PNJ</option>
                                    <option value="PNJSilver">PNJSilver</option>
                                    <option value="STYLE">STYLE BY PNJ</option>
                                    <option value="emoji">PNJ x emoji™</option>
                                    <option value="Disney">Disney|PNJ</option>
                                    <option value="SANRIO">SANRIO</option>
                                    <option value="MANCODE">MANCODE by PNJ</option>
                                </select>
                            </div>
                            <div class="box-selected">
                                <select class="form-select">
                                    <option value="" hidden selected>Giá</option>
                                    <option value="PNJ">PNJ</option>
                                    <option value="PNJSilver">PNJSilver</option>
                                    <option value="STYLE">STYLE BY PNJ</option>
                                    <option value="emoji">PNJ x emoji™</option>
                                    <option value="Disney">Disney|PNJ</option>
                                    <option value="SANRIO">SANRIO</option>
                                    <option value="MANCODE">MANCODE by PNJ</option>
                                </select>
                            </div>
                            <div class="box-selected">
                                <select class="form-select">
                                    <option value="" hidden selected>Bộ sưu tập</option>
                                    <option value="PNJ">PNJ</option>
                                    <option value="PNJSilver">PNJSilver</option>
                                    <option value="STYLE">STYLE BY PNJ</option>
                                    <option value="emoji">PNJ x emoji™</option>
                                    <option value="Disney">Disney|PNJ</option>
                                    <option value="SANRIO">SANRIO</option>
                                    <option value="MANCODE">MANCODE by PNJ</option>
                                </select>
                            </div>
                            <div class="box-selected">
                                <select class="form-select">
                                    <option value="" hidden selected>Chất liệu</option>
                                    <option value="PNJ">PNJ</option>
                                    <option value="PNJSilver">PNJSilver</option>
                                    <option value="STYLE">STYLE BY PNJ</option>
                                    <option value="emoji">PNJ x emoji™</option>
                                    <option value="Disney">Disney|PNJ</option>
                                    <option value="SANRIO">SANRIO</option>
                                    <option value="MANCODE">MANCODE by PNJ</option>
                                </select>
                            </div>
                            <div class="box-selected">
                                <select class="form-select">
                                    <option value="" hidden selected>Giới tính</option>
                                    <option value="PNJ">PNJ</option>
                                    <option value="PNJSilver">PNJSilver</option>
                                    <option value="STYLE">STYLE BY PNJ</option>
                                    <option value="emoji">PNJ x emoji™</option>
                                    <option value="Disney">Disney|PNJ</option>
                                    <option value="SANRIO">SANRIO</option>
                                    <option value="MANCODE">MANCODE by PNJ</option>
                                </select>
                            </div>
                            <div class="box-selected">
                                <select class="form-select">
                                    <option value="" hidden selected>Loại trang sức</option>
                                    <option value="PNJ">PNJ</option>
                                    <option value="PNJSilver">PNJSilver</option>
                                    <option value="STYLE">STYLE BY PNJ</option>
                                    <option value="emoji">PNJ x emoji™</option>
                                    <option value="Disney">Disney|PNJ</option>
                                    <option value="SANRIO">SANRIO</option>
                                    <option value="MANCODE">MANCODE by PNJ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="item-sort">
                        <h3>Sắp xếp</h3>
                        <div class="box-selected">
                            <select name="" id="" class="form-select">
                                <option value="">Sản phẩm mới nhất</option>
                                <option value="">Giá từ thấp đến cao</option>
                                <option value="">Giá từ cao đến thấp</option>
                                <option value="">Sản phẩm bán chạy nhất</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-3" id="group-product">
                <div class="container">
                    @if ($products->count() > 0)
                        <div class="body-main row g-3">
                            @foreach ($products as $product)
                                <div class="col-md-3">
                                    <div class="card text-center">
                                        <a href="{{ route('client.detail', $product->id) }}">
                                            <div class="card-img position-relative">
                                                <img src="{{ Storage::url($product->product_image) }}"
                                                    class="card-img-top" alt="" />
                                                <img src="{{ asset('frontend/image/new-icon-3-w29.svg') }}"
                                                    class="img-sub-new" alt="" />
                                                <img class="img-sub-fast"
                                                    src="{{ asset('frontend/image/PNJfast-Giaotrong3h.svg') }}"
                                                    alt="" />
                                                <img class="img-sub-icon"
                                                    src="{{ asset('frontend/image/icon-tragop-2.svg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="card-body p-2">
                                                <h5 class="card-title">
                                                    <a
                                                        href="{{ route('client.detail', $product->id) }}">{{ $product->product_name }}</a>
                                                </h5>
                                                <div
                                                    class="card-text product-price mb-2 d-flex align-items-center justify-content-center gap-2">
                                                    @if ($product->sale_price != $product->sale_price)
                                                        <span
                                                            class="original-price text-decoration-line-through fst-italic">{{ formatPrice($product->original_price) }}</span>
                                                        <span
                                                            class="sale-price">{{ formatPrice($product->sale_price) }}</span>
                                                    @else
                                                        <span
                                                            class="sale-price">{{ formatPrice($product->sale_price) }}</span>
                                                    @endif
                                                </div>
                                                <div
                                                    class="product-order-and-rating d-flex align-items-center justify-content-between">
                                                    <div class="item-rating">
                                                        <span>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                        </span>
                                                        <span>5</span>
                                                    </div>
                                                    <div class="item-order">
                                                        <span>200+ đã bán</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="body-main d-flex justify-content-center align-items-center">
                            <p>Hiện chưa có sản phẩm nào!</p>
                        </div>
                    @endif
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
            </section>
        @endif
        @if ($type === 'collection' && optional($subBannerCollectionSecond)->banner_image)
            <section class="py-2" id="group-sub-banner-second">
                <div class="container">
                    <div class="body">
                        <img src="{{ Storage::url($subBannerCollectionSecond->banner_image) }}" alt=""
                            class="w-100">
                    </div>
                </div>
            </section>
        @endif
    </main>

    @include('frontend.layouts.include.footer')
@endsection

@push('link')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-category.css') }}" />
@endpush

@push('script')
    <script src="{{ asset('frontend/js/helper.js') }}"></script>
    <script src="{{ asset('frontend/js/client.js') }}"></script>
    <script src="{{ asset('frontend/js/detail.js') }}"></script>
@endpush
