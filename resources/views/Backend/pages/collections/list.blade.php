@extends('Backend.layouts.app')

@section('title', 'Bộ sưu tập')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bộ sưu tập</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bộ sưu tập</li>
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
                            <a href="{{ route('collection.create') }}" class="btn btn-primary">
                                <span><i class="fas fa-plus"></i></span>
                                <span class="ml-2">Thêm mới dữ liệu</span>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên bộ sưu tập</th>
                                        <th>Danh mục trang sức cưới</th>
                                        <th>Trạng thái</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listCollections as $index => $Collection)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if ($Collection->banner_image && \Storage::exists($Collection->banner_image))
                                                    <img src="{{ Storage::url($Collection->banner_image) }}" alt="Banner"
                                                        width="100">
                                                @else
                                                    <span class="badge bg-warning">Chưa có ảnh</span>
                                                @endif

                                            </td>
                                            <td>{{ $Collection->name }}</td>
                                            <td>
                                                @if ($Collection->is_wedding_collection == 0)
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
                                            <td class="switch-column ">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch{{ $Collection->id }}"
                                                        {{ $Collection->is_active ? '' : 'checked' }}
                                                        data-id="{{ $Collection->id }}" />
                                                    <label class="custom-control-label"
                                                        for="customSwitch{{ $Collection->id }}"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('collection.edit', $Collection) }}"
                                                    class="btn btn-warning text-light">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-{{ $Collection->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-{{ $Collection->id }}" tabindex="-1"
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
                                                        <form action="{{ route('collection.destroy', $Collection) }}"
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
                                        <th>Tên bộ sưu tập</th>
                                        <th>Danh mục trang sức cưới</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {{-- <button type="button" class="btn btn-success swalDefaultSuccess">
                                Launch Success Toast
                            </button> --}}
                            <div class="modal fade" id="modal-overlay">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="overlay">
                                            <i class="fas fa-2x fa-sync fa-spin"></i>
                                        </div>
                                        <div class="modal-header">
                                            <h4 class="modal-title">Default Modal</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>One fine body&hellip;</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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
