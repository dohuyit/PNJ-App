@extends('backend.layouts.app')

@section('title', 'Thuộc tính sản phẩm')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thuộc tính sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thuộc tính sản phẩm</li>
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
                                        <th>Tên thuộc tính</th>
                                        <th>Nhóm thuộc tính</th>
                                        <th>Danh mục trang sức cưới</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listAttributes as $index => $attribute)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $attribute->name }}</td>
                                            <td>
                                                @if ($attribute->group_attribute_name == 'Size')
                                                    <span class="badge badge-info">
                                                        {{ $attribute->group_attribute_name }}
                                                    </span>
                                                @elseif ($attribute->group_attribute_name == 'Giới tính')
                                                    <span class="badge badge-danger">
                                                        {{ $attribute->group_attribute_name }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-success">
                                                        {{ $attribute->group_attribute_name }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($attribute->is_wedding == 0)
                                                    <p class="btn btn-outline-success m-0 p-2">
                                                        <span class="mr-1">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                        <span>Có</span>
                                                    </p>
                                                @else
                                                    <p class="btn btn-outline-danger m-0 p-2">
                                                        <span class="mr-1">
                                                            <i class="fas fa-exclamation-circle"></i>
                                                        </span>
                                                        <span>Không</span>
                                                    </p>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('attribute-group.edit', $attribute) }}"
                                                    class="btn btn-warning text-light" data-toggle="modal"
                                                    data-target="#modal-edit-{{ $attribute->id }}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-delete-{{ $attribute->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-delete-{{ $attribute->id }}" tabindex="-1"
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
                                                        <form action="{{ route('attribute.destroy', $attribute) }}"
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

                                        <div class="modal fade" id="modal-edit-{{ $attribute->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Chỉnh Sửa Thuộc Tính</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('attribute.update', $attribute) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Tên Thuộc Tính</label>
                                                                <input type="text" name="name" id="name"
                                                                    class="form-control" placeholder="Nhập tên thuộc tính"
                                                                    value="{{ $attribute->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Nhóm Thuộc Tính</label>
                                                                <select name="group_attribute_id" class="form-control">
                                                                    @foreach ($groupAttributes as $id => $name)
                                                                        <option @selected($attribute->group_attribute_id == $id)
                                                                            value="{{ $id }}">
                                                                            {{ $name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Thuộc tính trang sức cưới</label>
                                                                <select name="is_wedding" id="isWedding"
                                                                    class="form-control">
                                                                    <option value="0"
                                                                        {{ $attribute->is_wedding == 0 ? 'selected' : '' }}>
                                                                        Có
                                                                    </option>
                                                                    <option value="1"
                                                                        {{ $attribute->is_wedding == 1 ? 'selected' : '' }}>
                                                                        Không
                                                                    </option>
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
                                        <th>Tên thuộc tính</th>
                                        <th>Nhóm thuộc tính</th>
                                        <th>Danh mục trang sức cưới</th>
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
                                        <h4 class="modal-title">Thêm Thuộc Tính</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('attribute.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Tên Thuộc Tính</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Nhập tên thuộc tính" value="{{ old('name') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nhóm Thuộc Tính</label>
                                                <select name="group_attribute_id" class="form-control">
                                                    <option value="" hidden selected>-- Nhóm thuộc tính --</option>
                                                    @foreach ($groupAttributes as $id => $name)
                                                        <option value="{{ $id }}">
                                                            {{ $name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Thuộc tính trang sức cưới</label>
                                                <select name="is_wedding" id="isWedding" class="form-control">
                                                    <option value="0" {{ old('is_wedding') == 0 ? 'selected' : '' }}>
                                                        Có
                                                    </option>
                                                    <option value="1"
                                                        {{ old('is_wedding', 1) == 1 ? 'selected' : '' }}>Không
                                                    </option>
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
