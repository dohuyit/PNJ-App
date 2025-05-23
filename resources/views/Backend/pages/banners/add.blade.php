@extends('backend.layouts.app')

@section('title', 'Thêm banner mới')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm banner mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm banner mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Form nhập thông tin -->
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title">Nhập thông tin banner</h3>
                                <a href="{{ route('banner.index') }}" class="ml-auto d-flex align-items-center">
                                    <i class="fas fa-arrow-left"></i>
                                    <span class="ml-2">Quay lại trang danh sách</span>
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên banner</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên banner"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Link banner</label>
                                    <input type="text" class="form-control" name="link" placeholder="Nhập link banner"
                                        value="{{ old('link') }}">
                                    @error('link')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Vị trí hiển thị</label>
                                    <select name="position" id="position" class="form-control">
                                        <option value="slide" {{ old('position') == 'slide' ? 'selected' : '' }}>Slide
                                        </option>
                                        <option value="submenu" {{ old('position') == 'submenu' ? 'selected' : '' }}>Submenu
                                        </option>
                                        <option value="collections"
                                            {{ old('position') == 'collections' ? 'selected' : '' }}>
                                            Collection</option>
                                        <option value="jewelry_lines"
                                            {{ old('position') == 'jewelry_lines' ? 'selected' : '' }}>Jewelry Line</option>
                                        <option value="brands" {{ old('position') == 'brands' ? 'selected' : '' }}>Brand
                                        </option>
                                    </select>
                                </div>
                                <div id="reference_section" style="display: none;" class="form-group">
                                    <label>Chọn danh mục tham chiếu:</label>
                                    <select name="reference_id" id="reference_id" class="form-control">
                                        <!-- JS sẽ load danh sách khi chọn position -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Chế độ ưu tiên</label>
                                    <select name="priority" class="form-control">
                                        <option value="1" {{ old('priority', 1) == 1 ? 'selected' : '' }}>Ưu tiên thứ
                                            nhất
                                        </option>
                                        <option value="2" {{ old('priority') == 2 ? 'selected' : '' }}>Ưu tiên thứ hai
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái hiển thị</label>
                                    <select name="is_active" class="form-control">
                                        <option value="0" {{ old('is_active', 0) == 0 ? 'selected' : '' }}>Hiển thị
                                        </option>
                                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form thêm hình ảnh -->
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thêm ảnh banner</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Chọn hình ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input image-input" name="banner_image">
                                            <label class="custom-file-label">Chọn tệp</label>
                                        </div>
                                    </div>
                                    @error('banner_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="container-img text-center position-relative d-none">
                                    <img class="preview-image image_banner rounded-2 w-100 " src="#"
                                        alt="Xem trước hình ảnh">
                                    <button type="button"
                                        class="btn btn-danger remove-image position-absolute rounded-circle ">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Thao tác</h3>
                            </div>
                            <div class="card-body d-flex align-items-center">
                                <button type="submit" class="btn btn-outline-success d-flex align-items-center mr-2">
                                    <span><i class="fas fa-save"></i></span>
                                    <span class="ml-2">Thêm mới dữ liệu</span>
                                </button>
                                <button type="reset" class="btn btn-outline-danger d-flex align-items-center ">
                                    <span><i class="fas fa-undo"></i></span>
                                    <span class="ml-2">Reset</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
@push('link')
    <link rel="stylesheet" href="{{ asset('backend/dist/css/add.css') }}">
@endpush
@push('script')
    <script src="{{ asset('backend/dist/js/pages/function.js') }}"></script>
    <script>
        document.getElementById("position").addEventListener("change", function() {
            let position = this.value;
            let refSection = document.getElementById("reference_section");
            let refSelect = document.getElementById("reference_id");

            refSelect.innerHTML = ""; // Xóa danh sách cũ

            if (position === "collections") {
                fetch("/api/banner/collections").then(res => res.json()).then(data => {
                    data.forEach(item => {
                        let option = new Option(item.name, item.id);
                        refSelect.add(option);
                    });
                });
                refSection.style.display = "block";
            } else if (position === "jewelry_lines") {
                fetch("/api/banner/jewelry-lines").then(res => res.json()).then(data => {
                    data.forEach(item => {
                        let option = new Option(item.name, item.id);
                        refSelect.add(option);
                    });
                });
                refSection.style.display = "block";
            } else if (position === "brands") {
                fetch("/api/banner/brands").then(res => res.json()).then(data => {
                    data.forEach(item => {
                        let option = new Option(item.name, item.id);
                        refSelect.add(option);
                    });
                });
                refSection.style.display = "block";
            } else {
                refSection.style.display = "none";
            }
        });
    </script>
@endpush
