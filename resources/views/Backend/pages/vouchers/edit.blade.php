@extends('backend.layouts.app')

@section('title', 'Cập nhật giảm giá mới')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật giảm giá mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cập nhật giảm giá mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('voucher.update', $voucher) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Form nhập thông tin -->
                    <div class="col-md-8" id="mainCard">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Nhập thông tin mã giảm giá</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Mã giảm giá</label>
                                        <input type="text" class="form-control" name="voucher_code"
                                            placeholder="Nhập mã giảm giá" value="{{ $voucher->voucher_code }}"
                                            id="voucher_code">
                                        <button type="button" id="generate_code" class="btn btn-info mt-2">Tạo
                                            mã</button>
                                        @error('voucher_code')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Tên mã giảm giá</label>
                                        <input type="text" class="form-control" name="voucher_name"
                                            placeholder="Nhập tên mã giảm giá" value="{{ $voucher->voucher_name }}">
                                        @error('voucher_name')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Tổng tiền giảm giá</label>
                                        <input type="text" class="form-control" name="discount_amount"
                                            placeholder="Giá trị áp dụng tối thiểu" value="{{ $voucher->discount_amount }}">
                                        @error('discount_amount')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Loại ưu đãi</label>
                                        <select name="is_fixed" id="" class="form-control">
                                            <option @selected($voucher->is_fixed == 0) value="0">Giảm giá theo phần trăm
                                            </option>
                                            <option @selected($voucher->is_fixed == 1) value="1">Giảm giá theo số tiền
                                            </option>
                                        </select>
                                        @error('is_fixed')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Số lần sử dụng tối đa</label>
                                        <input type="number" class="form-control" name="max_uses"
                                            placeholder="Nhập Số lần sử dụng tối đa" value="{{ $voucher->max_uses ?? 0 }}"
                                            min="1">
                                        @error('max_uses')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Số lần sử dụng của tài khoản</label>
                                        <input type="number" class="form-control" name="max_uses_user"
                                            placeholder="Số lần sử dụng của tài khoản"
                                            value="{{ $voucher->max_uses ?? 0 }}" min="1">
                                        @error('max_uses_user')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Giá trị áp dụng tối thiểu</label>
                                        <input type="text" class="form-control" name="min_order_value"
                                            placeholder="Giá trị áp dụng tối thiểu"
                                            value="{{ $voucher->min_order_value ?? 0 }}">
                                        @error('min_order_value')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Loại áp dụng giảm giá</label>
                                        <select class="form-control" name="type" id="typeSelect">
                                            <option @selected($voucher->type == 0) value="0">Toàn bộ sản phẩm</option>
                                            <option @selected($voucher->type == 1) value="1">Sản phẩm cố định</option>
                                            <option @selected($voucher->type == 2) value="2">Người dùng cố định</option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Ngày bắt đầu</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($voucher->start_date)->format('Y-m-d') }}">

                                        @error('start_date')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Ngày kết thúc</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($voucher->end_date)->format('Y-m-d') }}">

                                        @error('end_date')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="4" name="description" placeholder="Nhập mô tả">{{ $voucher->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card sản phẩm -->
                    <div class="col-md-4" id="subCard">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thao tác</h3>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-outline-success">
                                    <span><i class="fas fa-save"></i></span>
                                    <span class="ml-2">Cập nhật dữ liệu</span>
                                </button>
                                <a href="{{ route('voucher.index') }}" class="btn btn-outline-primary ml-2">
                                    <span><i class="fas fa-undo"></i></span>
                                    <span class="ml-2">Quay lại</span>
                                </a>
                            </div>
                        </div>
                        <div class="card d-none" id="productCard">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin sản phẩm</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox" class="select-all"></th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listProducts as $product)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="product_id[]" class="item-checkbox"
                                                        value="{{ $product->id }}"
                                                        @if ($dataVoucherDetail && $dataVoucherDetail->products->contains('id', $product->id)) checked @endif>
                                                </td>
                                                <td><img src="{{ Storage::url($product->product_image) }}"
                                                        class="img-thumbnail" alt="product"></td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ formatPrice($product->sale_price) }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card d-none" id="userCard">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin người dùng</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox" class="select-all"></th>
                                            <th scope="col">Người dùng</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Địa chỉ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listUsers as $user)
                                            <tr>
                                                <td><input type="checkbox" name="user_id[]" class="item-checkbox"
                                                        @if ($dataVoucherDetail && $dataVoucherDetail->users->contains('id', $user->id)) checked @endif
                                                        value="{{ $user->id }}"></td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @php
                                                        $ward = $user->ward->name ?? '';
                                                        $district = $user->district->name ?? '';
                                                        $city = $user->city->name ?? '';
                                                    @endphp

                                                    @if ($ward || $district || $city)
                                                        {{ $ward }}, {{ $district }}, {{ $city }}
                                                    @else
                                                        <span class="badge bg-secondary">Trống</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <script src="{{ asset('backend/dist/js/pages/function.js') }}"></script>\
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select all checkboxes within the same table
            document.querySelectorAll(".select-all").forEach(selectAllCheckbox => {
                selectAllCheckbox.addEventListener("change", function() {
                    this.closest("table").querySelectorAll(".item-checkbox").forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                });
            });

            // Toggle display cards based on selection
            const typeSelect = document.getElementById("typeSelect");
            const productCard = document.getElementById("productCard");
            const userCard = document.getElementById("userCard");
            const mainCard = document.getElementById("mainCard");
            const subCard = document.getElementById("subCard");

            function toggleCards() {
                const selectedValue = typeSelect.value;
                const isProduct = selectedValue === "1";
                const isUser = selectedValue === "2";

                mainCard.classList.toggle("col-md-7", isProduct || isUser);
                mainCard.classList.toggle("col-md-8", !isProduct && !isUser);
                subCard.classList.toggle("col-md-5", isProduct || isUser);
                subCard.classList.toggle("col-md-4", !isProduct && !isUser);

                productCard.classList.toggle("d-none", !isProduct);
                userCard.classList.toggle("d-none", !isUser);
            }

            typeSelect.addEventListener("change", toggleCards);
            toggleCards(); // Gọi lần đầu để thiết lập trạng thái mặc định

            // Generate voucher code
            document.getElementById("generate_code").addEventListener("click", function() {
                document.getElementById("voucher_code").value = generateVoucherCode();
            });

            function generateVoucherCode() {
                return Array.from({
                    length: 8
                }, () => "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789" [Math.floor(Math.random() * 36)]).join('');
            }

            // Date validation
            const today = new Date().toISOString().split("T")[0];
            const startDateInput = document.getElementById("start_date");
            const endDateInput = document.getElementById("end_date");

            startDateInput.min = endDateInput.min = today;

            startDateInput.addEventListener("change", function() {
                const startDate = new Date(this.value);
                const nextDayString = new Date(startDate.setDate(startDate.getDate() + 1)).toISOString()
                    .split("T")[0];

                endDateInput.min = nextDayString;

                if (endDateInput.value && endDateInput.value <= this.value) {
                    endDateInput.value = nextDayString;
                    alert("Ngày kết thúc phải lớn hơn ngày bắt đầu.");
                }
            });
        });
    </script>
@endpush
