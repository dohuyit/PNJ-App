<aside class="main-sidebar sidebar-light-primary elevation-3">
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class=" mt-3 pb-3 mb-3 d-flex">
            <a href="{{ route('index') }}" class="brand-link">
                <img src="{{ asset('frontend/image/pnj.com.vn.png') }}" alt="PNJ Logo" class="w-75">
            </a>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li
                    class="nav-item {{ request()->routeIs([
                        'category.index',
                        'attribute-group.index',
                        'attribute.index',
                        'product-type.index',
                        'product.index',
                        'jewelry-line.index',
                        'collection.index',
                        'brand.index',
                    ])
                        ? 'menu-open'
                        : 'menu-close' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs([
                            'category.index',
                            'attribute-group.index',
                            'attribute.index',
                            'product-type.index',
                            'product.index',
                            'jewelry-line.index',
                            'collection.index',
                            'brand.index',
                        ])
                            ? 'active'
                            : '' }}">
                        <i class="fas fa-boxes"></i>
                        <p class="ml-2">
                            Quản lí sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li
                            class="nav-item {{ request()->routeIs(['attribute-group.index', 'attribute.index']) ? 'menu-open' : 'menu-close' }}">
                            <a href="#"
                                class="nav-link {{ request()->routeIs(['attribute-group.index', 'attribute.index']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Cài đặt sản phẩm
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ml-3">
                                    <a href="{{ route('attribute-group.index') }}"
                                        class="nav-link {{ request()->routeIs('attribute-group.index') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Nhóm thuộc tính</p>
                                    </a>
                                </li>
                                <li class="nav-item ml-3">
                                    <a href="{{ route('attribute.index') }}"
                                        class="nav-link {{ request()->routeIs('attribute.index') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Thuộc tính</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}"
                                class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh mục sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product-type.index') }}"
                                class="nav-link {{ request()->routeIs('product-type.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}"
                                class="nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jewelry-line.index') }}"
                                class="nav-link {{ request()->routeIs('jewelry-line.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dòng hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('collection.index') }}"
                                class="nav-link {{ request()->routeIs('collection.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bộ sưu tập</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.index') }}"
                                class="nav-link {{ request()->routeIs('brand.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thương hiệu</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ request()->routeIs(['voucher.index', 'voucher.create']) ? 'menu-open' : 'menu-close' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs(['voucher.index', 'voucher.create']) ? 'active' : '' }}">
                        <i class="fas fa-ticket-alt"></i>
                        <p class="ml-2">
                            Quản lí mã giảm giá
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('voucher.index') }}"
                                class="nav-link {{ request()->routeIs('voucher.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách mã giảm giá</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('voucher.create') }}"
                                class="nav-link {{ request()->routeIs('voucher.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->routeIs(['employee-admin.index', 'customer.index']) ? 'menu-open' : 'menu-close' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs(['employee-admin.index', 'customer.index']) ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p class="ml-2">
                            Quản lí tài khoản
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('employee-admin.index') }}"
                                class="nav-link {{ request()->routeIs('employee-admin.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài khoản quản trị</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer.index') }}"
                                class="nav-link {{ request()->routeIs('customer.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài khoản người dùng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('order.index') ? 'menu-open' : 'menu-close' }}">
                    <a href="{{ route('order.index') }}"
                        class="nav-link {{ request()->routeIs('order.index') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart"></i>
                        <p class="ml-2">
                            Quản lí dơn hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('banner.index') ? 'menu-open' : 'menu-close' }}">
                    <a href="{{ route('banner.index') }}"
                        class="nav-link {{ request()->routeIs('banner.index') ? 'active' : '' }}">
                        <i class="fas fa-images"></i>
                        <p class="ml-2">
                            Quản lí banner
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('comment.index') ? 'menu-open' : 'menu-close' }}">
                    <a href="{{ route('comment.index') }}"
                        class="nav-link {{ request()->routeIs('comment.index') ? 'active' : '' }}">
                        <i class="fas fa-comments"></i>
                        <p class="ml-2">
                            Quản lí bình luận
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
