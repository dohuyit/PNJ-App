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
                            <form action="{{ route('detail.profile.update', $customer->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="row justify-content-evenly">
                                    <div class="col-md-3 shadow-md py-4">
                                        <div class="user-avatar-container mb-4">
                                            <div class="avatar-wrapper">
                                                <div class="avatar-circle">
                                                    <img src="{{ $customer->avatar ? Storage::url($customer->avatar) : asset('frontend/image/avatar-default.jpg') }}"
                                                        alt="User Avatar" class="avatar-image" id="avatar-preview">
                                                    <div class="avatar-overlay">
                                                        <i class="fas fa-camera"></i>
                                                    </div>
                                                    <input type="file" id="avatar-input" class="avatar-input"
                                                        name="avatar" hidden>
                                                </div>
                                                <div class="avatar-info text-center mt-3 py-4 px-3 ">
                                                    <h5 class="mb-1">Ảnh đại diện</h5>
                                                    <p class="text-muted small">Kích thước tối đa: 2MB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Cột phải - Form thông tin -->
                                    <div class="col-md-8 shadow-md py-4">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label d-block">Danh xưng *</label>
                                                <input type="radio" name="gender" id="female" value="1"
                                                    {{ $customer->gender == 1 ? 'checked' : '' }}>
                                                <label for="female">Chị</label>
                                                <input type="radio" name="gender" id="male" class="ms-3"
                                                    value="0" {{ $customer->gender == 0 ? 'checked' : '' }}>
                                                <label for="male">Anh</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Họ và tên *</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập họ và tên của bạn..." name="username"
                                                    value="{{ $customer->username }}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Ngày sinh *</label>
                                                <input type="date" class="form-control" name="birthday"
                                                    value="{{ \Carbon\Carbon::parse($customer->birthday)->format('Y-m-d') }}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Email *</label>
                                                <input type="email" class="form-control" placeholder="Email của bạn..."
                                                    name="email" value="{{ $customer->email }}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Số điện thoại *</label>
                                                <input type="text" class="form-control" placeholder="Nhập số điện thoại"
                                                    name="phone" value="{{ $customer->phone }}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Địa chỉ *</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Số nhà, đường cụ thể..." name="address"
                                                    value="{{ $customer->address }}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Tỉnh / Thành</label>
                                                <select name="city_id" id="city" class="form-control">
                                                    <option value="" hidden selected>-- Tỉnh / Thành Phố --</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}" @selected($customer->city_id == $city->id)>
                                                            {{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Quận / Huyện</label>
                                                <select name="district_id" id="district" class="form-control">
                                                    <option value="" hidden selected>-- Quận / Huyện --</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}" @selected($customer->district_id == $district->id)>
                                                            {{ $district->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Phường / Xã</label>
                                                <select name="ward_id" id="ward" class="form-control">
                                                    <option value="" hidden selected>-- Xã / Phường --</option>
                                                    @foreach ($wards as $ward)
                                                        <option value="{{ $ward->id }}" @selected($customer->ward_id == $ward->id)>
                                                            {{ $ward->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

@push('script')
    <script src="{{ asset('frontend/js/detail-user.js') }}"></script>
@endpush
