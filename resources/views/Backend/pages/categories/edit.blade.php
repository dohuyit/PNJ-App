@extends('backend.layouts.app')

@section('title', 'Cập nhật danh mục')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cập nhật danh mục</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('category.update', $category) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Form nhập thông tin -->
                    <div class="col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Nhập thông tin danh mục</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nhập tên danh mục" value="{{ $category->name }}">
                                    @error('name')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mô tả danh mục</label>
                                    <textarea class="form-control" rows="4" name="description" placeholder="Nhập mô tả">{{ $category->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="isActive">Trạng thái hiển thị</label>
                                    <select name="is_active" id="isActive" class="form-control ">
                                        <option value="0" {{ $category->is_active == 0 ? 'selected' : '' }}>Hiển thị
                                        </option>
                                        <option value="1"{{ $category->is_active == 1 ? 'selected' : '' }}>Ẩn
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info d-flex align-items-center ">
                                    <span><i class="fas fa-save"></i></span>
                                    <span class="ml-2">Cập nhật dữ liệu</span>
                                </button>
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
                                <input type="hidden" name="delete_banner_image" value="0">
                                <div
                                    class="container-img text-center position-relative {{ $category->banner_image ? '' : 'd-none' }}">
                                    <img class="preview-image image_banner rounded-2 w-100 "
                                        src="{{ $category->banner_image ? Storage::url($category->banner_image) : '#' }}"
                                        alt="Xem trước hình ảnh">
                                    <button type="button"
                                        class="btn btn-danger remove-image position-absolute rounded-circle ">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
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
    <link rel="stylesheet" href="{{ asset('backend/dist/css/add.css') }}">
@endpush
@push('script')
    <script src="{{ asset('backend/dist/js/pages/function.js') }}"></script>
@endpush
