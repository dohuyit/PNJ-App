@extends('backend.layouts.app')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Khách hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng tiền</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItemsData as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <b>Thời gian:</b> {{ formatTime($data->order->date) }} <br>
                                                <strong>{{ $data->order->name }}</strong> <br>
                                                {{ $data->order->phone }}
                                            </td>
                                            <td>
                                                <p class="text-muted m-0">Phường/Xã: {{ $data->order->ward->name }}</p>
                                                <p class="fw-bold text-info m-0">Quận/Huyện:
                                                    {{ $data->order->district->name }}
                                                </p>
                                                <p><strong>{{ $data->order->city->name }}</strong></p>
                                            </td>
                                            <td>
                                                @if ($data->order->paymentMethod->id == 1)
                                                    <span
                                                        class="badge py-2 bg-secondary">{{ $data->order->paymentMethod->name }}</span>
                                                @elseif ($data->order->paymentMethod->id == 2)
                                                    <span
                                                        class="badge p-2 bg-primary">{{ $data->order->paymentMethod->name }}</span>
                                                @else
                                                    <span
                                                        class="badge py-2 bg-danger">{{ $data->order->paymentMethod->name }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $statusColors = [
                                                        'Chờ xác nhận' => 'btn-outline-secondary',
                                                        'Đã xác nhận' => 'btn-outline-primary',
                                                        'Đang xử lý' => 'btn-outline-warning',
                                                        'Đang giao hàng' => 'btn-outline-info',
                                                        'Đã giao hàng' => 'btn-outline-success',
                                                        'Đã hủy' => 'btn-outline-danger',
                                                        'Hoàn trả' => 'btn-outline-dark',
                                                    ];
                                                    $status = $data->order->orderStatus->name;
                                                    $btnClass = $statusColors[$status] ?? 'btn-outline-secondary'; // Mặc định nếu không có
                                                @endphp

                                                <span class="btn {{ $btnClass }} btn-sm">{{ $status }}</span>
                                            </td>
                                            <td>
                                                {{ formatPrice($data->order->total_amount) }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('order.edit', $data->order->id) }}"
                                                    class="btn btn-primary text-light">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-{{ $data->order->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-{{ $data->order->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Xác nhận xóa</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bạn có chắc chắn muốn xóa danh mục này không?</p>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-between">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Hủy</button>
                                                        <form action="{{ route('order.destroy', $data->order->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-success">
                                                                Đồng ý
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Khách hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng tiền</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection

@push('link')
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('backend/dist/css/list.css') }} " />
@endpush
@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/pages/helper.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
