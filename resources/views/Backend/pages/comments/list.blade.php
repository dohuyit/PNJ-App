@extends('backend.layouts.app')

@section('title', 'Danh sách bình luận')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách bình luận</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách bình luận</li>
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
                                        <th>Tên tài khoản</th>
                                        <th>Nội dung</th>
                                        <th>Đánh giá sao</th>
                                        <th>Trạng thái</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listComments as $index => $comment)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $comment->users->username }}</td>
                                            <td>
                                                {{ $comment->content_comment }}
                                            </td>
                                            <td>
                                                @for ($i = 0; $i < $comment->rating; $i++)
                                                    <i class="text-warning fas fa-star"></i>
                                                @endfor
                                            </td>
                                            <td class="switch-column ">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch{{ $comment->id }}"
                                                        {{ $comment->status_comment == 0 ? '' : 'checked' }}
                                                        data-id="{{ $comment->id }}" />
                                                    <label class="custom-control-label"
                                                        for="customSwitch{{ $comment->id }}"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-{{ $comment->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-{{ $comment->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
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
                                                        <p>Bạn có chắc chắn muốn xóa bình luận này không?</p>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-between">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Hủy</button>
                                                        <form action="{{ route('comment.destroy', $comment) }}"
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
                                        <th>Tên tài khoản</th>
                                        <th>Nội dung</th>
                                        <th>Đánh giá sao</th>
                                        <th>Trạng thái</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </tfoot>
                            </table>
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
