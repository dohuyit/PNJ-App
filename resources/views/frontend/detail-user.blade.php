@extends('frontend.layouts.app')

@section('title', 'Thông tin khách hàng')

@section('content')
    <div class="container-fluid">
        <div class="row g-5">
            @include('frontend.layouts.include.aside')
            <main id="main" class="col-md-10">
                @include('frontend.layouts.include.nav')
                <div class="main-content">
                    <section id="group-infomation-user">
                        <div class="content-header">
                            <div class="container-fluid">
                                <h2 class="fs-5 py-2">
                                    <span>Trang chủ</span>
                                    <span>/</span>
                                    <span>Thông tin tài khoản</span>
                                </h2>
                            </div>
                        </div>
                        <div class="content">
                            <div class="container-fluid shadow-md py-3">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Danh xưng *</label><br>
                                        <input type="radio" name="gender" id="chi"> <label
                                            for="chi">Chị</label>
                                        <input type="radio" name="gender" id="anh" class="ms-3"> <label
                                            for="anh">Anh</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Họ và tên *</label>
                                        <input type="text" class="form-control" placeholder="Nhập họ và tên">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ngày sinh *</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email *</label>
                                        <input type="email" class="form-control" placeholder="example@gmail.com">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Số điện thoại *</label>
                                        <input type="text" class="form-control" placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ *</label>
                                        <input type="text" class="form-control" placeholder="Số nhà, đường, phường/xã">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ Tỉnh/Thành phố *</label>
                                        <select class="form-control">
                                            <option>Chọn Tỉnh/Thành phố</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ Quận/Huyện *</label>
                                        <select class="form-control">
                                            <option>Chọn Quận/Huyện</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                                </form>
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
@endsection

@push('link')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-user.css') }}" />
@endpush

