<header id="header">
    <div class="header-top header-lg">
        <div class="container">
            <!-- HEADER-TOP -->
            <div class="row border-bottom">
                <div class="col-lg-4 py-3 d-flex justify-content-start align-items-center gap-3 function-outer">
                    <a href="#" class="py-2">
                        <img class="icon-header" src="{{ asset('frontend/image/icon-relationship-new.svg') }}"
                            alt="icon quan hệ cổ đông" />
                        <span class="fs-6">Quan hệ cổ đông</span>
                    </a>
                    <a href="#" class="py-2">
                        <img class="icon-header" src="{{ asset('frontend/image/icon-stores-new.svg') }}"
                            alt="icon cửa hàng" />
                        <span class="fs-6">Cửa hàng</span>
                    </a>
                    <a href="#" class="py-2">
                        <img class="icon-header" src="{{ asset('frontend/image/hiring-icon.svg') }}" alt="" />
                        <span class="fs-6">Tuyển dụng</span>
                    </a>
                </div>
                <div class="col-lg-4 py-3 align-items-center text-center">
                    <a href="#" class="py-2 logo-outer">
                        <img src="{{ asset('frontend/image/pnj.com.vn.png') }}" class="img-fluid" alt="logo-pnj" />
                    </a>
                </div>
                <div class="col-lg-4 py-3 d-flex align-items-center justify-content-end gap-4 user-outer">
                    <a href="#" class="py-2">
                        <img class="icon-header" src="{{ asset('frontend/image/icon-hotline-new.svg') }}"
                            alt="" />
                        <span class="fs-6">1900 54 54 57</span>
                    </a>
                    <a href="#" class="cart-group py-2">
                        <img class="icon-header" src="{{ asset('frontend/image/icon-cart-new.svg') }}"
                            alt="icon cửa hàng" />
                        <span class="fs-6">Giỏ hàng</span>
                    </a>
                    <div class="auth-group py-2 position-relative d-flex align-items-center gap-2">
                        <img class="icon-header" src="{{ asset('frontend/image/icon-user.svg') }}"
                            alt="icon quan hệ cổ đông" />
                        @if (session()->has('client_auth'))
                            <p class="fs-6 d-flex flex-column">
                                <span>Xin chào</span>
                                <span>Đỗ Quốc Huy</span>
                            </p>
                        @else
                            <span class="fs-6">Tài khoản của tôi</span>
                        @endif
                        <div class="dropdown-option position-absolute top-100 end-0">
                            @if (session()->has('client_auth'))
                                <!-- after-login -->
                                <div
                                    class="card-dropdown after-login card p-3 shadow-lg d-flex justify-content-start align-items-center ">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="#"
                                                class="dropdown-item d-flex align-items-center gap-2 py-2">
                                                <span><i class="text-secondary fa-solid fa-house-user"></i></span>
                                                <span>Thông tin cá nhân</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="dropdown-item py-2 d-flex align-items-center gap-2">
                                                <span><i class="text-secondary fa-solid fa-truck-fast"></i></span>
                                                <span>Tra cứu đơn hàng</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('client.logout.process') }}"
                                                class="dropdown-item py-2 text-danger fw-bold d-flex align-items-center gap-2">
                                                <span><i
                                                        class="text-secondary fa-solid fa-right-from-bracket"></i></span>
                                                <span>Đăng xuất</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <!-- before-login -->
                                <div class="card-dropdown card before-login p-4 shadow-lg ">
                                    <h4 class="text-center fw-bold text-uppercase mb-3">
                                        <p class="m-0">Chào mừng quý khách</p>
                                        <p class="m-0 p-2">đến với PNJ</p>
                                    </h4>
                                    <p class="text-center text-muted mb-3">
                                        Đăng nhập tài khoản của Quý Khách
                                    </p>

                                    <div class="text-center">
                                        <a href="{{ route('client.login.form') }}" class="btn btn-primary fw-bold">
                                            Đăng nhập
                                        </a>
                                    </div>

                                    <hr />

                                    <h4 class="text-center fw-bold">ĐĂNG KÍ THÀNH VIÊN</h4>
                                    <div class="d-grid mt-3">
                                        <a href="{{ route('client.register.form') }}"
                                            class="btn btn-outline-dark fw-bold">
                                            ĐĂNG KÝ
                                        </a>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADER RESPONSIVE -->
    <div class="header-md-sm d-block d-lg-none">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between py-2">
                <!-- Logo -->
                <div class="item-logo">
                    <a href="#" class="logo-outer">
                        <img src="./image/pnj.com.vn.png" class="img-fluid" alt="logo-pnj" />
                    </a>
                </div>
                <!-- Search Bar -->
                <div class="item-search d-flex align-items-center justify-content-center">
                    <form class="d-flex align-items-center">
                        <input type="text" class="form-control" placeholder="Tìm kiếm..." />
                        <button class="btn-search-mobile px-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <!-- Cart Icon -->
                <div class="item-bag pe-2 position-relative">
                    <a href="#" class="">
                        <img class="icon-header" src="./image/icon-cart-new.svg" alt="icon cửa hàng" />
                    </a>
                    <span class="badge bg bg-danger position-absolute">1</span>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- NAVBAR - HEADER MIDDLE -->
    <nav class="navbar navbar-expand-md shadow-sm navbar-lg">
        <div class=".navbar-container position-relative container d-flex align-items-center justify-content-center">
            <div class="row d-flex align-items-center w-100 justify-content-between">
                <div class="col-md-8 ps-0">
                    <ul class="navbar-nav gap-4">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Trang sức</a>
                            <ul class="submenu position-absolute top-100 start-0 shadow-lg d-flex gap-5 px-5 py-4">
                                <li class="submenu-content d-flex justify-content-between flex-grow-1">
                                    <div class="column-submenu">
                                        <h4 class="submenu-title fw-bold">Chủng loại</h4>
                                        <ul class="submenu-items ps-0">
                                            <li><a class="submenu-link" href="#">Nhẫn</a></li>
                                            <li><a class="submenu-link" href="#">Nhẫn</a></li>
                                            <li><a class="submenu-link" href="#">Nhẫn</a></li>
                                            <li><a class="submenu-link" href="#">Nhẫn</a></li>
                                            <li><a class="submenu-link" href="#">Nhẫn</a></li>
                                            <li><a class="submenu-link" href="#">Nhẫn</a></li>
                                            <li><a class="submenu-link" href="#">Nhẫn</a></li>
                                            <li><a class="submenu-link" href="#">Nhẫn</a></li>
                                        </ul>
                                    </div>
                                    <div class="column-submenu">
                                        <h4 class="submenu-title fw-bold">Chất liệu</h4>
                                        <ul class="submenu-items ps-0">
                                            <li><a class="submenu-link" href="#">Vàng</a></li>
                                            <li><a class="submenu-link" href="#">Bạc</a></li>
                                            <li>
                                                <a class="submenu-link" href="#">Platinum</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="column-submenu">
                                        <h4 class="submenu-title fw-bold">Dòng hàng</h4>
                                        <ul class="submenu-items ps-0">
                                            <li>
                                                <a class="submenu-link" href="#">Trang sức đính kim cương</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">Trang sức ECZ</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức ngọc trai</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức không đính đá</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức công nghệ ý</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức đính đá quý</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức CZ</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="column-submenu">
                                        <h4 class="submenu-title fw-bold">Bộ sưu tập</h4>
                                        <ul class="submenu-items ps-0">
                                            <li>
                                                <a class="submenu-link" href="#">Kim bảo như ý</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">Trang sức ECZ</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức ngọc trai</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức không đính đá</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức công nghệ ý</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức đính đá quý</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức CZ</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="column-submenu">
                                        <h4 class="submenu-title fw-bold">Dòng hàng</h4>
                                        <ul class="submenu-items ps-0">
                                            <li>
                                                <a class="submenu-link" href="#">Trang sức đính kim cương</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">Trang sức ECZ</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức ngọc trai</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức không đính đá</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức công nghệ ý</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức đính đá quý</a>
                                            </li>
                                            <li>
                                                <a class="submenu-link" href="#">TRang sức CZ</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="submenu-banner">
                                    <img src="./image/XUAN2025-Vang24K_Banner-400x270.webp" alt="" />
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Trang sức cưới</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Đồng Hồ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Quà tặng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Thương hiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Khuyến mãi</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 p-0">
                    <form class="d-flex align-items-center justify-content-end">
                        <input type="text" name="" id="" class="form-control"
                            placeholder="Tìm kiếm..." />
                        <button class="btn btn-light btn-search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- NAVBAR-RESPONSIVE -->
    <nav class="navbar navbar-md-sm position-fixed bg-light w-100 pt-2">
        <ul class="nav-list row d-flex align-items-center w-100">
            <li class="nav-item col-2 d-flex justify-content-center align-items-center flex-column">
                <a class="nav-link" href="#">
                    <span class="icon d-block text-center">
                        <img src="./image/home-default.svg" alt="" />
                    </span>
                    <span class="text">Trang chủ</span>
                </a>
            </li>
            <li class="nav-item col-2 d-flex justify-content-center align-items-center flex-column">
                <a class="nav-link" href="#">
                    <span class="icon d-block text-center">
                        <img src="./image/tabsale-default.svg" alt="" />
                    </span>
                    <span class="text">Khuyến mãi</span>
                </a>
            </li>
            <li class="nav-item col-2 d-flex justify-content-center align-items-center flex-column">
                <a class="nav-link" href="#">
                    <span class="icon d-block text-center">
                        <img src="./image/ME-default.svg" alt="" />
                    </span>
                    <span class="text">My PNJ</span>
                </a>
            </li>
            <li class="nav-item col-2 d-flex justify-content-center align-items-center flex-column">
                <a class="nav-link" href="#">
                    <span class="icon d-block text-center">
                        <img src="./image/noti-default.svg" alt="" />
                    </span>
                    <span class="text">Thông báo</span>
                </a>
            </li>
            <li class="nav-item col-2 d-flex justify-content-center align-items-center flex-column">
                <a class="nav-link" href="#">
                    <span class="icon d-block text-center">
                        <img src="./image/Tuvan-icon-1.svg" alt="" />
                    </span>
                    <span class="text">Tư vấn</span>
                </a>
            </li>
            <li class="nav-item col-2 d-flex justify-content-center align-items-center flex-column">
                <button class="icon d-block border-0 bg-transparent" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <span class="text">Danh mục</span>
            </li>
        </ul>
    </nav>
    <div class="collapse menu-mobile position-fixed top-0 end-0 h-100 bg-light shadow" id="mobileMenu">
        <div class="p-3 d-flex justify-content-between align-items-center border-bottom">
            <img src="./image/pnj.com.vn.png" alt="Logo" class="logo" width="100" />
            <button type="button" class="btn-close" data-bs-toggle="collapse" data-bs-target="#mobileMenu"
                aria-label="Close"></button>
        </div>
        <ul class="navbar-main navbar-nav px-3">
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" href="#">
                    <span>Trang Sức</span>
                    <span><i class="bi bi-chevron-down"></i></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" href="#">
                    Thương hiệu
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="submenu collapse ps-3">
                    <li><a class="nav-link" href="#">Trang Sức Phong Thủy</a></li>
                    <li><a class="nav-link" href="#">Trang Sức Theo Cung</a></li>
                    <li><a class="nav-link" href="#">Trang Sức Theo Mệnh</a></li>
                    <li><a class="nav-link" href="#">Trang Sức Trẻ Em</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Best Seller</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Hàng Đặt Trước</a>
            </li>
        </ul>
    </div>
    <div class="menu-overlay position-fixed top-0 start-0 w-100 h-100"></div>
</header>
