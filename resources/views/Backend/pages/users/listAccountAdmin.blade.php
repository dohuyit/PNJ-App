@extends('backend.layouts.app')

@section('title', 'Tài khoản quản trị')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tài khoản quản trị</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tài khoản quản trị</li>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                                <span><i class="fas fa-plus"></i></span>
                                <span class="ml-2">Thêm mới dữ liệu</span>
                            </button>
                        </div>
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
                                    @foreach ($listAccountAdmin as $index => $adminAccount)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if ($adminAccount->avatar && \Storage::exists($adminAccount->avatar))
                                                    <img src="{{ Storage::url($adminAccount->avatar) }}" alt="Banner"
                                                        width="100">
                                                @else
                                                    <span class="badge bg-warning">Chưa có ảnh</span>
                                                @endif
                                            </td>
                                            <td>{{ $adminAccount->username }}</td>
                                            <td>{{ $adminAccount->email }}</td>
                                            <td>{{ $adminAccount->phone ? $adminAccount->phone : 'Trống' }}</td>
                                            <td>
                                                @if ($adminAccount->status == 0)
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
                                                <a href="{{ route('employee-admin.edit', $adminAccount->id) }}"
                                                    class="btn btn-warning text-light" data-toggle="modal"
                                                    data-target="#modal-edit-{{ $adminAccount->id }}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-delete-{{ $adminAccount->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-delete-{{ $adminAccount->id }}" tabindex="-1"
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
                                                        <form action="{{ route('account.destroy', $adminAccount) }}"
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

                                        <div class="modal fade" id="modal-edit-{{ $adminAccount->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Chỉnh Sửa tài khoản quản trị</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('employee-admin.update', $adminAccount) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Họ và tên</label>
                                                                <input type="text" name="username" class="form-control"
                                                                    placeholder="Họ và tên người quản trị..."
                                                                    value="{{ $adminAccount->username }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" name="email" class="form-control"
                                                                    placeholder="Email người quản trị..."
                                                                    value="{{ $adminAccount->email }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Vai trò</label>
                                                                <select name="role_id" id="isWedding"
                                                                    class="form-control">
                                                                    <option value="" hidden selected>-- Chọn vai trò
                                                                        --</option>
                                                                    @foreach ($listRoleIsAdmin as $role)
                                                                        <option value="{{ $role->id }}">
                                                                            {{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-between">
                                                            <button type="button" class="btn btn-outline-danger"
                                                                data-dismiss="modal">
                                                                <span><i class="fas fa-exclamation-circle"></i></span>
                                                                <span class="ml-2">Hủy bỏ</span></button>
                                                            <button type="submit" class="btn btn-outline-success">
                                                                <span><i class="fas fa-save"></i></span>
                                                                <span class="ml-2">Cập nhật dữ liệu</span>
                                                            </button>
                                                        </div>
                                                    </form>
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
                        <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Thêm tài khoản</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('employee-admin.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="Họ và tên người quản trị..."
                                                    value="{{ old('username') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Email người quản trị..." value="{{ old('username') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Vai trò</label>
                                                <select name="role_id" id="isWedding" class="form-control">
                                                    <option value="" hidden selected>-- Chọn vai trò --</option>
                                                    @foreach ($listRoleIsAdmin as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                                                <span><i class="fas fa-exclamation-circle"></i></span>
                                                <span class="ml-2">Hủy bỏ</span></button>
                                            <button type="submit" class="btn btn-outline-success">
                                                <span><i class="fas fa-save"></i></span>
                                                <span class="ml-2">Thêm mới dữ liệu</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- modal --}}
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
