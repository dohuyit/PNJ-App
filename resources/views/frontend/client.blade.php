@extends('frontend.layouts.app')

@section('title', 'Trang chủ PNJ ')
@section('content')
    @include('frontend.layouts.include.header')
    <main>
        <section class="my-3" id="slider">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <div class="carousel-indicators">
                                @foreach ($dataBanners as $index => $banner)
                                    <li class="dot @if ($index == 0) active @endif"
                                        data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}">
                                    </li>
                                @endforeach
                            </div>
                        </div>
                        <div class="carousel-inner">
                            @foreach ($dataBanners as $index => $banner)
                                <div class="carousel-item @if ($index == 0) active @endif">
                                    <img src="{{ Storage::url($banner->banner_image) }}" class="d-block w-100"
                                        alt="{{ $banner->name }}" />
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="my-4" id="group-about">
            <div class="container">
                <div class="row justify-content-center gap-3">
                    <div class="col-md-4 service-box d-flex align-items-center justify-content-center p-3">
                        <img src="{{ asset('frontend/image/shipping-icon.svg') }}" alt="Giao hàng nhanh" class="icon">
                        <div class="content ms-3">
                            <h6 class="fw-bold text-uppercase text-primary mb-0">Miễn phí</h6>
                            <p class="mb-0">Giao hàng 3H</p>
                        </div>
                    </div>
                    <div class="col-md-4 service-box d-flex align-items-center justify-content-center p-3">
                        <img src="{{ asset('frontend/image/shopping 247-icon.svg') }}" alt="Phục vụ 24/7" class="icon">
                        <div class="content ms-3">
                            <h6 class="fw-bold text-uppercase text-primary mb-0">Phục vụ 24/7</h6>
                        </div>
                    </div>
                    <div class="col-md-4 service-box d-flex align-items-center justify-content-center p-3">
                        <img src="{{ asset('frontend/image/thudoi-icon.svg') }}" alt="Thu đổi 48h" class="icon">
                        <div class="content ms-3">
                            <h6 class="fw-bold text-uppercase text-primary mb-0">Thu đổi 48H</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if ($dataVoucher->isNotEmpty())
            <section class="my-5" id="group-voucher">
                <div class="container">
                    <div class="title-group pb-3 text-primary px-5">
                        <h2 class="fs-5 text-center fw-bold">Code ưu đãi độc quyền</h2>
                    </div>
                    <div class="block-voucher">
                        <div class="voucher-items-list d-flex flex-wrap justify-content-center overflow-hidden">
                            @foreach ($dataVoucher as $voucher)
                                <div class="voucher-item d-flex">
                                    <div class="voucher-item-info">
                                        <div
                                            class="voucher-item-detail p-3 d-flex flex-column justify-content-center flex-grow-1">
                                            <div class="voucher-item-title d-block">
                                                <strong>
                                                    <span>
                                                        <span class="fw-bold">GIẢM THÊM
                                                            @if ($voucher->is_fixed == 0)
                                                                {{ intval($voucher->discount_amount) }}%
                                                            @else
                                                                {{ formatPrice($voucher->discount_amount) }}
                                                            @endif
                                                        </span>
                                                        <br>
                                                    </span>
                                                </strong>
                                            </div>
                                            <div class="voucher-item-des">
                                                <span>Nhập mã </span>
                                                <strong>
                                                    <span>
                                                        <span>{{ $voucher->voucher_code }}</span>
                                                    </span>
                                                </strong>
                                            </div>
                                            <div class="voucher-item-des">
                                                <span>Cho đơn hàng từ {{ formatPrice($voucher->min_order_value) }}</span>
                                            </div>
                                            <div class="voucher-item-date">
                                                <span class="expire fw-bold">Hết hạn:
                                                    {{ \Carbon\Carbon::parse($voucher->end_date)->format('d-m-Y') }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="voucher-item-action d-flex align-items-center justify-content-center">
                                            <div class="action btn btn-primary copy-btn"
                                                data-code="{{ $voucher->voucher_code }}">
                                                <span class="copy-content" data-copied-text="Đã chép">Sao
                                                    chép
                                                    mã
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <section class="my-5" id="group-brand">
            <div class="container">
                <div class="title-group pb-3 text-primary px-5">
                    <h2 class="fs-5 text-center fw-bold">Thương hiệu nổi tiếng</h2>
                </div>
                <div class="body-swiper px-5 position-relative">
                    <div class="swiper myBrand">
                        <div class="swiper-wrapper">
                            @foreach ($dataBrands as $brand)
                                <div class="swiper-slide position-relative z-0">
                                    <div class="brand-img">
                                        <img class="rounded" src="{{ Storage::url($brand->image_thumbnail) }}"
                                            alt="brand1" />
                                    </div>
                                    <div class="brand-desc">
                                        <p class="rounded-2">
                                            <img src="{{ Storage::url($brand->logo_brand) }}" alt="" />
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <!-- pagination -->
                    <div class="swiper-pagination mobile"></div>
                </div>
            </div>
        </section>
        <section class="py-5" id="group-products-option">
            <div class="container py-4">
                <div class="header-group nav nav-tabs d-flex align-items-center justify-content-center gap-2">
                    <button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#new-products">
                        Sản phẩm mới
                    </button>
                    <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#best-sellers">
                        Sản phẩm bán chạy
                    </button>
                </div>
                <div class="body-group tab-content mt-4">
                    <div class="tab-pane fade show active" id="new-products">
                        <div class="body-swiper px-5 position-relative">
                            <div class="swiper myBestseller">
                                <div class="swiper-wrapper">
                                    @foreach ($dataNewProducts as $product)
                                        <div class="swiper-slide card">
                                            <a href="{{ route('client.product', $product->id) }}">
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
                                                            href="{{ route('client.product', $product->id) }}">{{ $product->product_name }}</a>
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
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="#" class="btn btn-outline-light">Xem tất cả</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="best-sellers">
                        <div class="body-swiper px-5 position-relative">
                            <div class="swiper myBestseller">
                                <div class="swiper-wrapper">
                                    @foreach ($dataProductFeatures as $product)
                                        <div class="swiper-slide card">
                                            <a href="#">
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
                                                        <a href="#">{{ $product->product_name }}</a>
                                                    </h5>
                                                    <div
                                                        class="card-text product-price mb-2 d-flex align-items-center justify-content-center gap-2">
                                                        @if ($product->sale_price)
                                                            <span
                                                                class="original-price text-decoration-line-through fst-italic">{{ formatPrice($product->original_price) }}</span>
                                                            <span
                                                                class="sale-price">{{ formatPrice($product->sale_price) }}</span>
                                                        @else
                                                            <span
                                                                class="sale-price">{{ formatPrice($product->original_price) }}</span>
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
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="#" class="btn btn-outline-light">Xem tất cả</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-5" id="group-collection">
            <div class="container">
                <div class="title-group pb-2 text-primary px-5">
                    <h2 class="fs-5 text-center fw-bold">Bộ sưu tập mới</h2>
                </div>
                <div class="row">
                    <div class="col-12 px-5 position-relative mb-4 body-slider-collection">
                        <div class="swiper sliderCollection">
                            <div class="swiper-wrapper">
                                @foreach ($dataCollections as $index => $item)
                                    <div class="swiper-slide collection-item" data-id="{{ $item->id }}"
                                        @if ($index === 0) data-active="true" @endif>
                                        <img src="{{ Storage::url($item->image_thumbnail) }}" class="img-fluid"
                                            alt="{{ $item->name }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="col-12 body-swiper">
                        <div class="body-swiper px-5 position-relative">
                            <div class="swiper myBestseller">
                                <div id="product-list" class="swiper-wrapper">
                                    {{-- <div class="swiper-slide card">
                                        <div class="card-img position-relative">
                                            <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                            <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg"
                                                alt="" />
                                            <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                        </div>
                                        <div class="card-body p-2">
                                            <h5 class="card-title">
                                                <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                    TPXMW000045</a>
                                            </h5>
                                            <p class="card-text product-price">6.801.000đ</p>
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
                                    </div> --}}
                                </div>
                            </div>
                            <!-- Navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="btn-link-all text-center mt-3">
                            <a href="#" class="btn btn-outline-light">Xem tất cả</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-5" id="group-jewelry-line">
            <div class="jewelry-line-feature">
                <div class="container">
                    <div class="title-group py-4 text-primary px-5 text-center">
                        <h2 class="fs-5">Dòng hàng nổi bật</h2>
                    </div>
                    <div class="body-group">
                        <div class="row justify-content-center">
                            <div class="col-4 banner-main">
                                <img src="" class="rounded-2" alt="" width="400" height="400" />
                            </div>
                            <div class="col-7 content-main">
                                <div class="list-tags d-flex flex-wrap gap-2">
                                    @foreach ($dataJewelryLines as $jewelryLine)
                                        <button href="#" data-id="{{ $jewelryLine->id }}"
                                            class="btn lh-lg item-tags fw-bold text-capitalize">{{ $jewelryLine->name }}</button>
                                    @endforeach
                                </div>
                                <div class="desc-for-tag mt-4 fst-italic text-primary">
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="jewelry-line-product">
                <div class="header-group mb-5 d-flex align-items-end justify-content-center">
                    <img src="{{ asset('frontend/image/arrow-down.svg') }}" alt="" class="" />
                </div>
                <div class="body-group py-4">
                    <div class="container">
                        <div class="body-swiper px-5 position-relative">
                            <div class="swiper myBestseller">
                                <div id="list-jewelryline-products" class="swiper-wrapper">

                                </div>
                            </div>
                            <!-- Navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="#" class="btn btn-light">Xem tất cả</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end product by cate -->
        <section class="py-5" id="group-media">
            <div class="container">
                <div class="title-group">
                    <img src="{{ asset('frontend/image/title-group-media.webp') }}" class="w-100" alt="" />
                </div>

                <div class="body-group mt-5">
                    <video src="{{ asset('frontend/video/video-pnj.mp4') }}" class="w-100 rounded-3"
                        poster="{{ asset('frontend/image/thumbnail hires.png') }}" controls loop></video>
                </div>
            </div>
        </section>

        <section class="py-5" id="group-blogs">
            <div class="container">
                <div class="title-group">
                    <h3 class="position-relative text-center py-3">
                        <a href="#">Tin tức và sự kiện</a>
                    </h3>
                </div>
                <div class="body-group">
                    <div class="row">
                        <div class="col-md-5 blog-banner">
                            <img src="./image/GIAVANG-_THÔNG_TIN_HOMEPAGE_-_15.01.jpg" alt="" />
                        </div>
                        <div class="col-md-7 blog-content">
                            <div class="row list-content-blog text-center lh-base">
                                <div class="col-md-6 item-blog">
                                    <img src="./image/thumbnail2-bst-bling-bling-fruit-tu-pnj-hello-kitty-cung-bestie-to-diem-lung-linh-mua-le-hoi-2024.jpg "
                                        alt="" />
                                    <div class="desc-blog">
                                        <h4 class="my-3">
                                            BST Bling Bling Fruit từ PNJ ❤️ Hello Kitty: Cùng
                                            bestie tô điểm lung linh mùa lễ hội 2024
                                        </h4>
                                        <p>
                                            PNJ ❤️ Hello Kitty mang đến một bất ngờ lấp lánh cho
                                            besties với BST Bling Bling Fruit, hứa hẹn sẽ làm say
                                            đắm trái tim của mọi tín đồ tiệc tùng.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 item-blog">
                                    <img src="./image/thumbnail2-tang-nang-mua-giang-sinh-ruc-ro-voi-6-mon-qua-trang-suc-kim-cuong-y-nghia.jpg"
                                        alt="" />
                                    <div class="desc-blog">
                                        <h4 class="my-3">
                                            Tặng nàng mùa Giáng sinh rực rỡ với 6 món quà trang
                                            sức kim cương ý nghĩa
                                        </h4>
                                        <p>
                                            Hãy để “viên kim cương đầu tiên” trở thành món quà
                                            tưởng thưởng cho hành trình 2024 tuyệt vời của bạn và
                                            những người thân yêu nhé!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button class="btn btn-outline-primary px-5">
                                    Xem tất cả
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('frontend.layouts.include.footer')
@endsection

@push('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/chatbot.css') }}" />
@endpush

@push('script')
    <script>
        var storageUrl = "{{ Storage::url('') }}";
    </script>
    <script src="{{ asset('frontend/js/helper.js') }}"></script>
    <script src="{{ asset('frontend/js/client.js') }}"></script>
@endpush
