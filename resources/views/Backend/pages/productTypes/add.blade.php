@extends('Backend.layouts.app')

@section('title', 'Thêm loại sản phẩm')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm loại sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm loại sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('product-type.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Form nhập thông tin -->
                    <div class="col-md-7">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Nhập thông tin loại sản phẩm</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryName">Tên loại</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nhập tên danh mục" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mô tả danh mục</label>
                                    <textarea class="form-control" rows="4" name="description" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="category_id" class="form-control">
                                        <option value="" hidden selected>---Danh mục---</option>
                                        @foreach ($Categories as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="isActive">Trạng thái hiển thị</label>
                                    <select name="is_active" id="isActive" class="form-control ">
                                        <option value="0" {{ old('is_active', 0) == 0 ? 'selected' : '' }}>Hiển thị
                                        </option>
                                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Ẩn</option>
                                    </select>
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
                    <div class="col-md-5">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thêm hình ảnh</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryImage">Chọn hình ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="productTypeImage"
                                                name="banner_image">
                                            <label class="custom-file-label" for="productTypeImage">Chọn tệp</label>
                                        </div>
                                    </div>
                                    @error('banner_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group text-center">
                                    <img id="newImage" src="#" alt="Xem trước hình ảnh"
                                        style="max-width: 100%; height: auto; display: none;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
@push('script')
    <script src="{{ asset('Backend/dist/js/pages/function.js') }}"></script>
@endpush
