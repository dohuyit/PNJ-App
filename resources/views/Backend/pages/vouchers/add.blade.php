@extends('backend.layouts.app')

@section('title', 'Thêm mã giảm giá mới')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm mã giảm giá mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm mã giảm giá mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('jewelry-line.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Form nhập thông tin -->
                    <div class="col-md-7">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Nhập thông tin mã giảm giá</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên dòng hàng</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nhập tên dòng hàng" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mô tả danh mục</label>
                                    <textarea class="form-control" rows="4" name="description" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                                </div>
                                <div class="container-select row">
                                    <div class="form-group col-6">
                                        <label for="isWedding">Danh mục trang sức cưới</label>
                                        <select name="is_wedding" id="isWedding" class="form-control">
                                            <option value="0" {{ old('is_wedding') == 0 ? 'selected' : '' }}>Có
                                            </option>
                                            <option value="1" {{ old('is_wedding', 1) == 1 ? 'selected' : '' }}>Không
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="isActive">Trạng thái hiển thị</label>
                                        <select name="is_active" id="isActive" class="form-control">
                                            <option value="0" {{ old('is_active', 0) == 0 ? 'selected' : '' }}>Hiển thị
                                            </option>
                                            <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Ẩn</option>
                                        </select>
                                    </div>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Nhập thông tin mã giảm giá</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col"><input type="checkbox" id="selectAll"></th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Danh mục</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" class="product-checkbox"></td>
                                            <td><img src="https://via.placeholder.com/50" class="img-thumbnail"
                                                    alt="product"></td>
                                            <td>Nhẫn Kim Cương</td>
                                            <td>5,000,000đ</td>
                                            <td>Trang Sức Kim Cương</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="product-checkbox"></td>
                                            <td><img src="https://via.placeholder.com/50" class="img-thumbnail"
                                                    alt="product"></td>
                                            <td>Dây Chuyền Vàng</td>
                                            <td>3,200,000đ</td>
                                            <td>Trang Sức Vàng</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="product-checkbox"></td>
                                            <td><img src="https://via.placeholder.com/50" class="img-thumbnail"
                                                    alt="product"></td>
                                            <td>Đồng Hồ Rolex</td>
                                            <td>15,000,000đ</td>
                                            <td>Đồng Hồ</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container mt-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Danh sách tài khoản</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col"><input type="checkbox" id="select-all"></th>
                                                    <th scope="col">Họ và tên</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Vai trò</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="checkbox" class="user-checkbox"></td>
                                                    <td>Đỗ Quốc Huy</td>
                                                    <td>huydo@example.com</td>
                                                    <td>Người dùng</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" class="user-checkbox"></td>
                                                    <td>Nguyễn Văn A</td>
                                                    <td>nguyenvana@example.com</td>
                                                    <td>Quản trị viên</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" class="user-checkbox"></td>
                                                    <td>Trần Thị B</td>
                                                    <td>tranthib@example.com</td>
                                                    <td>Người dùng</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
    <link rel="stylesheet" href="{{ asset('backend/dist/css/add.css') }}">
@endpush
@push('script')
    <script src="{{ asset('backend/dist/js/pages/function.js') }}"></script>
@endpush
