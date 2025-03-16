<aside class="main-sidebar p-3 col-md-2 shadow-md">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link d-block text-center mb-3">
        <a href="{{ route('client.home') }}" class="py-2 logo-outer">
            <img src="{{ asset('frontend/image/pnj.com.vn.png') }}" class="img-fluid" alt="logo-pnj" width="150" />
        </a>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <span class="ms-2">Thông tin tài khoản</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-tag"></i>
                        <span class="ms-2">Mã giảm giá của tôi</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span class="ms-2">Lịch sử mua hàng</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-heart"></i>
                        <span class="ms-2">Sản phẩm yêu thích</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item logout">
                    <a href="#" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="ms-2">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
