@extends('frontend.layouts.app')

@section('title', 'Thông tin khách hàng')

@section('content')
    @include('frontend.layouts.include.header')
    <main id="main">
        <section id="group-content-search" class="my-5">
            <div class="container">
                <div class="row">
                    <aside id="group-sidebar" class="col-md-3">
                        <div class="body sticky-sidebar">
                            <div class="filter-group">
                                <h3 class="mb-3">Bộ lọc</h3>
                            </div>

                            <div class="filter-group">
                                <h5>Khuyến mãi</h5>
                                <div class="filter-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dealCheck1">
                                        <label class="form-check-label" for="dealCheck1">Giảm đến đặc biệt</label>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dealCheck2">
                                        <label class="form-check-label" for="dealCheck2">Khuyến mãi</label>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dealCheck3">
                                        <label class="form-check-label" for="dealCheck3">Hàng mới nhất</label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <h5>Giới Tính</h5>
                                <div class="filter-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="genderCheck1">
                                        <label class="form-check-label" for="genderCheck1">Nữ</label>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="genderCheck2">
                                        <label class="form-check-label" for="genderCheck2">Nam</label>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <h5>Chủng Loại</h5>
                                <div class="list-filter">
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="typeCheck1">
                                            <label class="form-check-label" for="typeCheck1">Nhẫn</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="typeCheck2">
                                            <label class="form-check-label" for="typeCheck2">Bông tai</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="typeCheck3">
                                            <label class="form-check-label" for="typeCheck3">Lắc</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="typeCheck4">
                                            <label class="form-check-label" for="typeCheck4">Dây chuyền</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="typeCheck5">
                                            <label class="form-check-label" for="typeCheck5">Vòng</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="typeCheck6">
                                            <label class="form-check-label" for="typeCheck6">Mặt dây chuyền</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="typeCheck7">
                                            <label class="form-check-label" for="typeCheck7">Dây cổ</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="typeCheck8">
                                            <label class="form-check-label" for="typeCheck8">Charm</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <h5>Dòng Hàng</h5>
                                <div class="list-filter">
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="lineCheck1">
                                            <label class="form-check-label" for="lineCheck1">Trang sức kim
                                                cương</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="lineCheck2">
                                            <label class="form-check-label" for="lineCheck2">Trang sức ECZ</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="lineCheck3">
                                            <label class="form-check-label" for="lineCheck3">Trang sức Y</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="lineCheck4">
                                            <label class="form-check-label" for="lineCheck4">Trang sức cỗ</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="lineCheck5">
                                            <label class="form-check-label" for="lineCheck5">Trang sức nhiệm giới
                                                24</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="lineCheck6">
                                            <label class="form-check-label" for="lineCheck6">Trang sức cát
                                                mệu</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="lineCheck7">
                                            <label class="form-check-label" for="lineCheck7">Trang sức CZ</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="lineCheck8">
                                            <label class="form-check-label" for="lineCheck8">Trang sức ngọc
                                                trai</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-group">
                                <h5>Chất Liệu</h5>
                                <div class="list-filter">
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="materialCheck1">
                                            <label class="form-check-label" for="materialCheck1">Vàng</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="materialCheck2">
                                            <label class="form-check-label" for="materialCheck2">Bạc</label>
                                        </div>
                                    </div>
                                    <div class="filter-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="materialCheck3">
                                            <label class="form-check-label" for="materialCheck3">Platinum</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class="content col-md-9">
                        <div class="header-content d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Kết quả tìm kiếm cho <span>Vàng</span></h3>
                            <span class="fst-italic">7274 sản phẩm</span>
                            <div class="group-select">
                                <select name="" id="" class="form-select">
                                    <option value="">Mặc định</option>
                                    <option value="#">Giá từ thấp đến cao</option>
                                    <option value="#">Giá từ cao đến thấp</option>
                                    <option value="#">Sản phẩm mới nhất</option>
                                    <option value="#">Sản phẩm bán chạy nhất</option>
                                </select>
                            </div>
                        </div>
                        <div class="body-content row g-3 my-4">
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
                                        <div
                                            class="product-order-and-rating d-flex align-items-center justify-content-end">
                                            <div class="item-order">
                                                <span>200+ đã bán</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
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
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
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
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
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
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
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
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
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
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
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
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-img position-relative">
                                        <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                        <img class="img-sub-new" src="./image/new-icon-3-w29.svg" alt="" />
                                        <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="" />
                                        <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="" />
                                    </div>
                                    <div class="card-body p-2">
                                        <h5 class="card-title">
                                            <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                                TPXMW000045</a>
                                        </h5>
                                        <p class="card-text product-price mb-4">6.801.000đ</p>
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
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('frontend.layouts.include.footer')
@endsection

@push('link')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-user.css') }}" />
@endpush
