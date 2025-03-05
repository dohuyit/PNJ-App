@extends('backend.layouts.app')

@section('title', 'Cập nhật sản phẩm mới')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật sản phẩm mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cập nhật sản phẩm mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('customer.update', $customerAccount) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="card-body container-avatar">
                                <div class="image-preview">
                                    @if ($customerAccount->avatar && Storage::exists($customerAccount->avatar))
                                        <img src="{{ Storage::url($customerAccount->avatar) }}" id="image-main">
                                    @else
                                        <img src="{{ asset('backend/img/avt-default.jpg') }}" id="image-main">
                                    @endif
                                </div>
                                <div class="mt-4 text-center">
                                    <label for="file-upload"
                                        class="custom-upload-btn align-items-center btn btn-primary w-auto">
                                        <span class="mr-2"><i class="fas fa-upload"></i></span>
                                        <span>Chọn ảnh</span>
                                    </label>
                                </div>
                                <input type="file" id="file-upload" name="avatar" hidden />
                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Thao tác</h3>
                            </div>
                            <div class="card-body d-flex align-items-center">
                                <button type="submit" class="btn btn-outline-success d-flex align-items-center mr-2">
                                    <span><i class="fas fa-save"></i></span>
                                    <span class="ml-2">Cập nhật dữ liệu</span>
                                </button>
                                <a href="{{ route('customer.index') }}"
                                    class="btn btn-outline-danger d-flex align-items-center ">
                                    <span><i class="fas fa-undo"></i></span>
                                    <span class="ml-2">Quay lại</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Form nhập thông tin -->
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">Nhập thông tin sản phẩm</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Tên người dùng</label>
                                        <input type="text" class="form-control" name="username"
                                            placeholder="Nhập tên người dùng" value="{{ $customerAccount->username }}">
                                        @error('username')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Email người dùng</label>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Nhập email người dùng" value="{{ $customerAccount->email }}">
                                        @error('email')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="Nhập số điện thoại" value="{{ $customerAccount->phone }}">
                                        @error('phone')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Giới tính</label>
                                        <select name="gender" class="form-control">
                                            <option value="0" {{ $customerAccount->gender == 0 ? 'selected' : '' }}>
                                                Nam
                                            </option>
                                            <option value="1" {{ $customerAccount->gender == 1 ? 'selected' : '' }}>
                                                Nữ
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Ngày sinh</label>
                                        <input type="date" class="form-control" name="birthday"
                                            value="{{ \Carbon\Carbon::parse($customerAccount->birthday)->format('Y-m-d') }}">
                                        @error('birthday')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Địa chỉ</label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Nhập địa chỉ cụ thể của bạn..."
                                            value="{{ $customerAccount->address }}">
                                        @error('address')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Tỉnh / Thành Phố</label>
                                        <select name="city_id" id="city" class="form-control">
                                            <option value="" hidden selected>-- Tỉnh / Thành Phố --</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}" @selected($customerAccount->city_id == $city->id)>
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Quận / Huyện</label>
                                        <select name="district_id" id="district" class="form-control">
                                            <option value="" hidden selected>-- Quận / Huyện --</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}" @selected($customerAccount->district_id == $district->id)>
                                                    {{ $district->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Xã / Phường</label>
                                        <select name="ward_id" id="ward" class="form-control">
                                            <option value="" hidden selected>-- Xã / Phường --</option>
                                            @foreach ($wards as $ward)
                                                <option value="{{ $ward->id }}" @selected($customerAccount->ward_id == $ward->id)>
                                                    {{ $ward->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Trạng thái </label>
                                        <select name="status" class="form-control">
                                            <option value="0" {{ $customerAccount->status == 0 ? 'selected' : '' }}>
                                                Họa động
                                            </option>
                                            <option value="1" {{ $customerAccount->status == 1 ? 'selected' : '' }}>
                                                Dừng hoạt động
                                            </option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('link')
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/simplemde/simplemde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/edit.css') }}">
@endpush
@push('script')
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/pages/function.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                height: 300,
            })

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const citySelect = document.getElementById("city");
            const districtSelect = document.getElementById("district");
            const wardSelect = document.getElementById("ward");

            const selectedDistrict = districtSelect.value;
            const selectedWard = wardSelect.value;

            // Khi chọn thành phố -> Load quận/huyện
            citySelect.addEventListener("change", function() {
                const cityId = this.value;
                districtSelect.innerHTML = '<option value="">Chọn Quận/Huyện</option>';
                wardSelect.innerHTML = '<option value="">Chọn Xã/Phường</option>';
                wardSelect.disabled = true;

                if (cityId) {
                    fetch(`/customer/districts/${cityId}`)
                        .then((response) => response.json())
                        .then((data) => {
                            data.forEach((district) => {
                                const option = document.createElement("option");
                                option.value = district.id;
                                option.textContent = district.name;
                                if (district.id == selectedDistrict)
                                    option.selected = true;
                                districtSelect.appendChild(option);
                            });
                            districtSelect.disabled = false;
                            districtSelect.dispatchEvent(new Event("change"));
                        })
                        .catch((error) =>
                            console.error("Lỗi khi tải Quận/Huyện:", error)
                        );
                } else {
                    districtSelect.disabled = true;
                    wardSelect.disabled = true;
                }
            });

            // Khi chọn quận/huyện -> Load xã/phường
            districtSelect.addEventListener("change", function() {
                const districtId = this.value;
                wardSelect.innerHTML = '<option value="">Chọn Xã/Phường</option>';

                if (districtId) {
                    fetch(`/customer/wards/${districtId}`)
                        .then((response) => response.json())
                        .then((data) => {
                            data.forEach((ward) => {
                                const option = document.createElement("option");
                                option.value = ward.id;
                                option.textContent = ward.name;
                                if (ward.id == selectedWard) option.selected = true;
                                wardSelect.appendChild(option);
                            });
                            wardSelect.disabled = false;
                        })
                        .catch((error) =>
                            console.error("Lỗi khi tải Xã/Phường:", error)
                        );
                } else {
                    wardSelect.disabled = true;
                }
            });

            // Tự động tải quận/huyện khi trang load
            if (citySelect.value) {
                citySelect.dispatchEvent(new Event("change"));
            }
        });
    </script>
@endpush
