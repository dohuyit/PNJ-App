@extends('backend.layouts.app')

@section('title', 'Tài khoản người dùng')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tài khoản người dùng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tài khoản người dùng</li>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình ảnh</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listAccountCustomer as $index => $customerAccount)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if ($customerAccount->avatar && \Storage::exists($customerAccount->avatar))
                                                    <img src="{{ Storage::url($customerAccount->avatar) }}" alt="Banner"
                                                        width="100">
                                                @else
                                                    <span class="badge bg-warning">Chưa có ảnh</span>
                                                @endif
                                            </td>
                                            <td>{{ $customerAccount->username }}</td>
                                            <td>{{ $customerAccount->email }}</td>
                                            <td>{{ $customerAccount->phone ? $customerAccount->phone : 'Trống' }}</td>
                                            <td>
                                                @if ($customerAccount->status == 0)
                                                    <p class="btn btn-outline-success m-0 p-2">
                                                        <span class="mr-1">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                        <span>Đang hoạt động</span>
                                                    </p>
                                                @else
                                                    <p class="btn btn-outline-danger m-0 p-2">
                                                        <span class="mr-1">
                                                            <i class="fas fa-exclamation-circle"></i>
                                                        </span>
                                                        <span>Dừng hoạt động</span>
                                                    </p>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('customer.edit', $customerAccount) }}"
                                                    class="btn btn-warning text-light">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-delete-{{ $customerAccount->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-delete-{{ $customerAccount->id }}" tabindex="-1"
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
                                                        <p>Bạn có chắc chắn muốn xóa không?</p>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-between">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Hủy</button>
                                                        <form action="{{ route('account.destroy', $customerAccount) }}"
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
                                        <th>Hình ảnh</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
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
    <link rel="stylesheet" href="{{ asset('Backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('Backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('Backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('Backend/dist/css/list.css') }} " />
@endpush
@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('Backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('Backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('Backend/dist/js/pages/helper.js') }}"></script>
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
