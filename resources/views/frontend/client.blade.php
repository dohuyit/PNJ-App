@extends('frontend.layouts.app')

@section('title', 'Trang chủ PNJ ')
@section('content')
    <main>
        <section class="my-3" id="slider">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <li class="dot active" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                aria-current="true" aria-label="Slide 1"></li>
                            <li class="dot" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></li>
                            <li class="dot" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></li>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('frontend/image/xmas-24-1972x640-cta.jpg') }}" class="d-block w-100"
                                    alt="banner1" />
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('frontend/image/ngaydoi-12-12-24-1972x640CTA.jpg') }}"
                                    class="d-block w-100" alt="banner2" />
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('frontend/image/tabsale-chung-t12-24-1972x640.jpg') }}"
                                    class="d-block w-100" alt="banner3" />
                            </div>
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
        <section class="my-2" id="banner-sub">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <img class="banner-sub-item img-fluid" src="./image/Banner_KC_TC_CTA__494x247_.jpg"
                            alt="bannerSub1" />
                    </div>
                    <div class="col-md-4">
                        <img class="banner-sub-item img-fluid" src="./image/FAIRY_TALE__Fixed-Banner_2.png"
                            alt="bannerSub2" />
                    </div>
                    <div class="col-md-4">
                        <img class="banner-sub-item img-fluid" src="./image/vuondasac-t12-494X247CTA.png"
                            alt="bannerSub3" />
                    </div>
                </div>
            </div>
        </section>
        <section class="my-4" id="group-hot-categories">
            <div class="container">
                <div class="title-group pb-3 text-primary px-5">
                    <h2 class="fs-5">Xu hướng tìm kiếm</h2>
                </div>
                <div class="body-swipper px-5">
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/nhan_kim_cuong.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Nhẫn kim cương</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/nhan_cuoi.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Nhẫn cưới</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/nhan_cau_hon.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Nhẫn cầu hôn</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/bong_tai.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Bông tai ECZ</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/day_chuyen_vang.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Dây chuyền vàng</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/dong_ho_kim_cuong.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Đồng hồ kim cương</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/trang_suc_mua_xuan.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Trang sức sắc xuân</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/trang_suc_cuoi.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Trang sức cưới</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/trang_suc_nam.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Trang sức nam</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/trang_suc_may_man.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Trang sức may mắn</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/trang_suc_vang.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Trang sức vàng</p>
                            </div>
                        </a>
                    </div>
                    <div class="swipper-slide">
                        <a href="#" class="text-center">
                            <div class="item-image mb-2">
                                <img class="rounded-3" src="./image/categories/trang_suc_bac.webp" alt="">
                            </div>
                            <div class="item-desc fw-bold text-primary">
                                <p>Trang sức bạc</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="my-5" id="group-brand">
            <div class="container">
                <div class="title-group pb-3 text-primary px-5">
                    <h2 class="fs-5">Thương hiệu nổi tiếng</h2>
                </div>
                <div class="body-swiper px-5 position-relative">
                    <div class="swiper myBrand">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide position-relative z-0">
                                <div class="brand-img">
                                    <img class="rounded" src="./image/brand/banner-child1.jpg" alt="brand1" />
                                </div>
                                <div class="brand-desc">
                                    <p class="rounded-2">
                                        <img src="./image/brand/style-logo_1.svg" alt="" />
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative z-0">
                                <div class="brand-img">
                                    <img class="rounded" src="./image/brand/banner-child5.png" alt="brand1" />
                                </div>
                                <div class="brand-desc">
                                    <p class="rounded-2">
                                        <img src="./image/brand/Mancode_Logo1.svg" alt="" />
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative">
                                <div class="brand-img">
                                    <img class="rounded" src="./image/brand/banner-child2.jpg" alt="brand1" />
                                </div>
                                <div class="brand-desc">
                                    <p class="rounded-2">
                                        <img src="./image/brand/pnj disney-01.png" alt="" />
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative">
                                <div class="brand-img">
                                    <img class="rounded" src="./image/brand/banner-child3.jpg" alt="brand1" />
                                </div>
                                <div class="brand-desc">
                                    <p class="rounded-2">
                                        <img src="./image/brand/sanrio1.svg" alt="" />
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide position-relative">
                                <div class="brand-img">
                                    <img class="rounded" src="./image/brand/banner-child4.jpg" alt="brand1" />
                                </div>
                                <div class="brand-desc">
                                    <p class="rounded-2">
                                        <img src="./image/brand/pnj-watch_1.svg" alt="" />
                                    </p>
                                </div>
                            </div>
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
        <section class="my-5" id="group-bestseller">
            <div class="container">
                <div class="title-group pb-3 text-primary px-5">
                    <h2 class="fs-5">Sản phẩm bán chạy</h2>
                </div>
                <div class="body-swiper px-5 position-relative">
                    <div class="swiper myBestseller">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
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
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
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
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
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
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
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
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
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
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
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
                            </div>
                        </div>
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
        <section class="my-5" id="group-new-arrival">
            <div class="container">
                <div class="title-group pb-3 text-primary px-5">
                    <h2 class="fs-5">Sản phẩm mới nhất</h2>
                </div>
                <div class="body-swiper px-5 position-relative">
                    <div class="swiper myBestseller">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
        <section class="my-5" id="group-collection">
            <div class="container">
                <div class="title-group pb-3 text-primary px-5">
                    <h2 class="fs-5">Bộ sưu tập mới</h2>
                </div>
                <div class="row">
                    <div class="col-12 px-5 position-relative mb-4 body-slider-collection">
                        <div class="swiper sliderCollection">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide collection-item">
                                    <img src="./image/collection/clt1.webp" class="img-fluid" alt="collection-item">
                                </div>
                                <div class="swiper-slide collection-item">
                                    <img src="./image/collection/clt2.webp" class="img-fluid" alt="collection-item">
                                </div>
                                <div class="swiper-slide collection-item">
                                    <img src="./image/collection/clt3.webp" class="img-fluid" alt="collection-item">
                                </div>
                                <div class="swiper-slide collection-item">
                                    <img src="./image/collection/clt4.webp" class="img-fluid" alt="collection-item">
                                </div>
                                <div class="swiper-slide collection-item">
                                    <img src="./image/collection/clt5.webp" class="img-fluid" alt="collection-item">
                                </div>
                                <div class="swiper-slide collection-item">
                                    <img src="./image/collection/clt6.webp" class="img-fluid" alt="collection-item">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination end-0"></div>
                    </div>
                    <div class="col-12 body-swiper px-5 position-relative">
                        <div class="swiper myCollection">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide card">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <!-- <div class="item-rating">
                                                                    <span>
                                                                        <i class="fa-solid fa-star text-warning"></i>
                                                                    </span>
                                                                    <span>5</span>
                                                                </div> -->
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide card">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <!-- <div class="item-rating">
                                                                    <span>
                                                                        <i class="fa-solid fa-star text-warning"></i>
                                                                    </span>
                                                                    <span>5</span>
                                                                </div> -->
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide card">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <!-- <div class="item-rating">
                                                                    <span>
                                                                        <i class="fa-solid fa-star text-warning"></i>
                                                                    </span>
                                                                    <span>5</span>
                                                                </div> -->
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide card">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <!-- <div class="item-rating">
                                                                    <span>
                                                                        <i class="fa-solid fa-star text-warning"></i>
                                                                    </span>
                                                                    <span>5</span>
                                                                </div> -->
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide card">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <!-- <div class="item-rating">
                                                                    <span>
                                                                        <i class="fa-solid fa-star text-warning"></i>
                                                                    </span>
                                                                    <span>5</span>
                                                                </div> -->
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide card">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <!-- <div class="item-rating">
                                                                    <span>
                                                                        <i class="fa-solid fa-star text-warning"></i>
                                                                    </span>
                                                                    <span>5</span>
                                                                </div> -->
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- products by cate  -->
        <section class="my-5" id="group-product-by-cate">
            <div class="container">
                <div class="banner-group">
                    <img class="w-100" src="./image/products/kimcuong-t11-24-1200x450CTA.jpg" alt="bannerGroup">
                </div>
                <div class="title-group py-4 text-primary px-5 text-center">
                    <h2 class="fs-5">Trang sức kim cương</h2>
                </div>
                <div class="body-swiper px-5 position-relative">
                    <div class="swiper myBestseller">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
        <section class="my-5" id="group-product-by-cate">
            <div class="container">
                <div class="banner-group">
                    <img class="w-100" src="./image/products/ngoctrai-t12-24-v2-1200x450-cta.jpg" alt="bannerGroup">
                </div>
                <div class="title-group py-4 text-primary px-5 text-center">
                    <h2 class="fs-5">Trang sức ngọc trai</h2>
                </div>
                <div class="body-swiper px-5 position-relative">
                    <div class="swiper myBestseller">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
        <section class="my-5" id="group-product-by-cate">
            <div class="container">
                <div class="banner-group">
                    <img class="w-100" src="./image/products/ecz-t9-24-1200x450CTA.jpg" alt="bannerGroup">
                </div>
                <div class="title-group py-4 text-primary px-5 text-center">
                    <h2 class="fs-5">Trang sức ecz</h2>
                </div>
                <div class="body-swiper px-5 position-relative">
                    <div class="swiper myBestseller">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="">
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-end">
                                        <!-- <div class="item-rating">
                                                                <span>
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                </span>
                                                                <span>5</span>
                                                            </div> -->
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
        <!-- end product by cate -->
        <section id="infor-store">
            <div class="wrap-store position-relative mt-5">
                <span class="bd bd-1"></span>
                <span class="bd bd-2"></span>
                <span class="bd bd-3"></span>
                <span class="bd bd-4"></span>
                <div class="container">
                    <div class="body row">
                        <div class="col-12 col-md-12">
                            <p class="p-2 text-capitalize text-center">Xem địa chỉ hệ thống hơn 340 Cửa Hàng PNJ
                                trên toàn quốc</p>
                            <div class="box-video position-relative">
                                <video id="myVideo" src="./video/16x9_35s_BrandFilm.mp4" type="video/mp4"></video>
                                <span class="btn-video"><i class="fa-solid fa-play"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-about">
                <div class="top-wrap-about text-center text-uppercase fw-bold">
                    <div class="container">
                        <h3>Tại sao nên chọn PNJ</h3>
                    </div>
                </div>
                <div class="bottom-wrap-about">
                    <div class="container">
                        <div class="body row align-items-center justify-content-center d-flex gap-5">
                            <div class="item col-4 col-md-4 text-center">
                                <div class="wrap-img">
                                    <img src="./image/icon-circle-tragop.svg" alt="" />
                                </div>
                                <div class="wrap-desc lh-base mt-2">
                                    <p class="title">TRẢ GÓP 0% LÃI SUẤT</p>
                                    <hr />
                                    <p class="description">
                                        Áp dụng dễ dàng qua thẻ tín dụng của hơn 20 ngân hàng
                                    </p>
                                </div>
                            </div>
                            <div class="item col-4 col-md-4 text-center">
                                <div class="wrap-img">
                                    <img src="./image/PNJfast-Giaotrong3h-circleicon.svg" alt="" />
                                </div>
                                <div class="wrap-desc lh-base mt-2">
                                    <p class="title">GIAO HÀNG 3H</p>
                                    <hr />
                                    <p class="description">
                                        Sở hữu ngay món trang sức yêu thích chỉ trong vòng 3 giờ
                                    </p>
                                </div>
                            </div>
                            <div class="item col-4 col-md-4 text-center">
                                <div class="wrap-img">
                                    <img src="./image/icon-circle-nbv.svg" alt="" />
                                </div>
                                <div class="wrap-desc lh-base mt-2">
                                    <p class="title">NGƯỜI BẠN VÀNG</p>
                                    <hr />
                                    <p class="description">
                                        Giải pháp tài chính cầm đồ; thu mua kim cương, túi hiệu
                                        và đồng hồ cơ
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-blog-news">
                <div class="container">
                    <h3 class="position-relative text-center py-3">
                        <a href="#">Tin tức và sự kiện</a>
                    </h3>
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
                                        <h4>
                                            BST Bling Bling Fruit từ PNJ ❤️ Hello Kitty: Cùng bestie tô điểm
                                            lung linh mùa lễ hội 2024
                                        </h4>
                                        <p>
                                            PNJ ❤️ Hello Kitty mang đến một bất ngờ lấp lánh cho besties với BST
                                            Bling Bling Fruit, hứa hẹn sẽ làm say đắm trái tim của mọi tín đồ
                                            tiệc tùng.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 item-blog">
                                    <img src="./image/thumbnail2-tang-nang-mua-giang-sinh-ruc-ro-voi-6-mon-qua-trang-suc-kim-cuong-y-nghia.jpg"
                                        alt="" />
                                    <div class="desc-blog">
                                        <h4>
                                            Tặng nàng mùa Giáng sinh rực rỡ với 6 món quà trang sức kim cương ý
                                            nghĩa
                                        </h4>
                                        <p>
                                            Hãy để “viên kim cương đầu tiên” trở thành món quà tưởng thưởng cho
                                            hành trình 2024 tuyệt vời của bạn và những người thân yêu nhé!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-view-all d-flex justify-content-center align-items-center mt-4">
                                <button class="btn btn-outline-primary px-5">Xem tất cả</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('link')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
@endpush

@push('script')
    <script src="{{ asset('frontend/js/helper.js') }}"></script>
    <script src="{{ asset('frontend/js/client.js') }}"></script>
@endpush
