@extends('backend.layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <!-- Form nhập thông tin -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Thông tin đơn hàng</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Tạm tính</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subTotal = 0;
                                            $shippingFee = 30000;
                                        @endphp
                                        @foreach ($dataOrder->orderItems as $index => $itemDetail)
                                            @php
                                                $totalItemPrice = $itemDetail->unit_price * $itemDetail->quantity;
                                                $subTotal += $totalItemPrice;
                                            @endphp
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($itemDetail->variant->product->product_image) }}"
                                                        alt="" width="80" class="img-thumbnail">
                                                </td>
                                                <td width="300">
                                                    <p class="w-100">{{ $itemDetail->variant->product->product_name }}
                                                    </p>
                                                </td>
                                                <td>{{ formatPrice($itemDetail->unit_price) }}</td>
                                                <td>{{ $itemDetail->quantity }}</td>
                                                <td>{{ formatPrice($totalItemPrice) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @php
                                $finalTotal = max(0, $subTotal + $shippingFee);
                            @endphp

                            <div class="col-md-6 my-3 p-0 ml-auto">
                                <div class="border p-3 rounded bg-light">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold">Tạm tính:</span>
                                        <span>{{ formatPrice($subTotal) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold">Khuyến mãi:</span>
                                        <span class="text-danger">- 0đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold">Phí ship:</span>
                                        <span>{{ formatPrice($shippingFee) }}</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold text-primary">Thành tiền:</span>
                                        <span class="fw-bold text-primary">{{ formatPrice($finalTotal) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('order.export.invoice', $dataOrder->id) }}" class="btn btn-info ">
                                <span><i class="fas fa-download"></i></span>
                                <span class="ml-2">Xuất hóa đơn</span>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- Form thêm hình ảnh -->
                <div class="col-md-3">
                    <div class="card">
                        <form action="{{ route('order.update', $dataOrder->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h3 class="card-title">Trạng thái đơn hàng</h3>
                            </div>
                            <div class="card-body">
                                <select name="status_id" id="" class="form-control">
                                    @foreach ($listStatus as $id => $name)
                                        <option @if ($id < $dataOrder->status_id) disabled @endif
                                            @selected($dataOrder->status_id == $id) value="{{ $id }}">
                                            {{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-success">
                                    <span><i class="fas fa-save"></i></span>
                                    <span class="ml-2">Cập nhật</span>
                                </button>
                                <a href="{{ route('order.index') }}" class="btn btn-outline-primary ml-2">
                                    <span><i class="fas fa-undo"></i></span>
                                    <span class="ml-2">Quay lại</span>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin khác hàng</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-item">
                                <label>Tên khách hàng</label>
                                <p>{{ $dataOrder->name }}</p>
                                <hr>
                            </div>
                            <div class="card-item">
                                <label>Email</label>
                                <p>{{ $dataOrder->email }}</p>
                                <hr>
                            </div>
                            <div class="card-item">
                                <label>Địa chỉ</label>
                                <p>{{ $dataOrder->address }}, {{ $dataOrder->district->name }},
                                    {{ $dataOrder->ward->name }}, {{ $dataOrder->city->name }}
                                </p>
                                <hr>
                            </div>
                            <div class="card-item">
                                <label>Ghi chú</label>
                                <p>Trống</p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('link')
    <link rel="stylesheet" href="{{ asset('backend/dist/css/add.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
@endpush
@push('script')
    <script src="{{ asset('backend/dist/js/pages/function.js') }}"></script>
@endpush
