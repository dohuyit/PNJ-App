@extends('backend.layouts.app')

@section('title', 'Thêm bộ sưu tập mới')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm bộ sưu tập mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm bộ sưu tập mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('collection.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Form nhập thông tin -->
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Nhập thông tin bộ sưu tập</h3>
                            </div>
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Tên bộ sưu tập</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nhập tên bộ sưu tập" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-6">
                                    <label for="isWedding">Danh mục trang sức cưới</label>
                                    <select name="is_wedding_collection" id="isWedding" class="form-control">
                                        <option value="0" {{ old('is_wedding_collection') == 0 ? 'selected' : '' }}>Có
                                        </option>
                                        <option value="1" {{ old('is_wedding_collection', 1) == 1 ? 'selected' : '' }}>
                                            Không
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Thương hiệu phụ thuộc</label>
                                    <select name="brand_id" class="form-control">
                                        <option value="" hidden selected>-- Chọn thương hiệu --</option>
                                        @foreach ($brands as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="isActive">Trạng thái hiển thị</label>
                                    <select name="is_active" id="isActive" class="form-control">
                                        <option value="0" {{ old('is_active', 0) == 0 ? 'selected' : '' }}>Hiển thị
                                        </option>
                                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label>Mô tả</label>
                                    <textarea class="form-control" rows="4" name="description" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary d-flex align-items-center ">
                                    <span><i class="fas fa-save"></i></span>
                                    <span class="ml-2">Thêm mới dữ liệu</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Form thêm hình ảnh -->
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thêm ảnh đại diện</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Chọn hình ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input image-input"
                                                name="image_thumbnail">
                                            <label class="custom-file-label">Chọn tệp</label>
                                        </div>
                                    </div>
                                    @error('avatar_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="container-img text-center position-relative d-none">
                                    <img class="preview-image image_thumbnail rounded-2 img-fluid" src="#"
                                        alt="Xem trước hình ảnh">
                                    <button type="button"
                                        class="btn btn-danger remove-image position-absolute rounded-circle ">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

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
