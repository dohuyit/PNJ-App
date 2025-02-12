@extends('backend.layouts.app')

@section('title', 'Cập nhật loại sản phẩm')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật loại sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cập nhật loại sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('product-type.update', $productType) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Form nhập thông tin -->
                    <div class="col-md-7">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Cập nhật loại sản phẩm</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên loại</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nhập tên loại sản phẩm..." value="{{ $productType->name }}">

                                    @error('name')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mô tả danh mục</label>
                                    <textarea class="form-control" rows="4" name="description" placeholder="Nhập mô tả">{{ $productType->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($Categories as $id => $name)
                                            <option @selected($productType->category_id == $id) value="{{ $id }}">
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="isActive">Trạng thái hiển thị</label>
                                    <select name="is_active" id="isActive" class="form-control ">
                                        <option value="0" {{ $productType->is_active == 0 ? 'selected' : '' }}>Hiển thị
                                        </option>
                                        <option value="1"{{ $productType->is_active == 1 ? 'selected' : '' }}>Ẩn
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info d-flex align-items-center ">
                                    <span><i class="fas fa-save"></i></span>
                                    <span class="ml-2">Lưu dữ liệu</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Form thêm hình ảnh -->
                    <div class="col-md-5">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Thêm hình ảnh</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Chọn hình ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner_image">
                                            <label class="custom-file-label">Chọn tệp</label>
                                        </div>
                                    </div>
                                    @error('banner_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group image-container">
                                    @if ($productType->banner_image)
                                        <img src="{{ Storage::url($productType->banner_image) }}" alt="Xem trước hình ảnh"
                                            class="previewImage" style="max-width: 100%; height: auto;" id="newImage" />
                                        <div class="form-check mt-2">
                                            <input type="checkbox" class="form-check-input removeImage" name="remove_image"
                                                value="1">
                                            <label class="form-check-label">Xóa ảnh hiện tại</label>
                                        </div>
                                    @endif
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
