@extends('backend.layouts.app')

@section('title', 'Cập nhật sản phẩm')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Form nhập thông tin -->
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Nhập thông tin sản phẩm</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="product_name"
                                            placeholder="Nhập tên sản phẩm" value="{{ $product->product_name }}">
                                        @error('product_name')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Giá sản phẩm</label>
                                        <div class="input-group d-flex align-items-center">
                                            <input type="text" class="form-control" name="original_price"
                                                placeholder="Giá gốc sản phẩm" value="{{ $product->original_price }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        @error('original_price')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Giá khuyến mãi</label>
                                        <div class="input-group d-flex align-items-center">
                                            <input type="text" class="form-control" name="sale_price"
                                                placeholder="Giá khuyến mãi" value="{{ $product->sale_price }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        @error('sale_price')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Danh mục sản phẩm</label>
                                        <select name="category_id" class="form-control">
                                            <option value="" hidden selected>-- Danh mục sản phẩm --</option>
                                            @foreach ($categories as $id => $name)
                                                <option @selected($product->category_id == $id) value="{{ $id }}">
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Loại sản phẩm</label>
                                        <select name="product_type_id" class="form-control">
                                            <option value="" hidden selected>-- Loại sản phẩm --</option>
                                            @foreach ($productTypes as $id => $name)
                                                <option @selected($product->product_type_id == $id) value="{{ $id }}">
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Sản phẩm nổi bật</label>
                                        <select name="is_featured" class="form-control">
                                            <option value="0" {{ $product->is_featured == 0 ? 'selected' : '' }}>Sản
                                                phẩm
                                                nổi bật
                                            </option>
                                            <option value="1" {{ $product->is_featured == 1 ? 'selected' : '' }}>
                                                Mặc định
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Danh mục trang sức cưới</label>
                                        <select name="is_wedding" class="form-control">
                                            <option value="0" {{ $product->is_weedind == 0 ? 'selected' : '' }}>Có
                                            </option>
                                            <option value="1" {{ $product->is_weedind == 1 ? 'selected' : '' }}>
                                                Không
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Trạng thái sản phẩm</label>
                                        <select name="product_status" class="form-control">
                                            <option value="0" {{ $product->product_status == 0 ? 'selected' : '' }}>
                                                Còn
                                                hàng
                                            </option>
                                            <option value="1" {{ $product->product_status == 1 ? 'selected' : '' }}>
                                                Hết hàng
                                            </option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Biến thể sản phẩm</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-12">
                                    <div id="variants-container">
                                        @if ($sizeVariants->isEmpty())
                                            <div class="variant-row d-flex align-items-end mb-2 g-2">
                                                <div class="select-item flex-grow-1 mr-2">
                                                    <label>Size</label>
                                                    <select name="attributes[{{ $sizeAttributes->id }}][]"
                                                        class="form-control">
                                                        <option value="" hidden>Chọn
                                                            {{ strtolower($sizeAttributes->name) }}</option>
                                                        @foreach ($sizeAttributes->attributes as $attribute)
                                                            <option value="{{ $attribute->id }}">{{ $attribute->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-item">
                                                    <label for="">Giá biến thể</label>
                                                    <input type="text" name="price_variant[]" value=""
                                                        class="form-control" placeholder="Giá biến thể...">
                                                </div>
                                                <button type="button" class="btn btn-danger remove-variant h-100 ml-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        @else
                                            @foreach ($sizeVariants as $variant)
                                                <div class="variant-row d-flex align-items-end mb-2 g-2">
                                                    <div class="select-item flex-grow-1 mr-2">
                                                        <label>Size</label>
                                                        <select name="attributes[{{ $sizeAttributes->id }}][]"
                                                            class="form-control">
                                                            <option value="" hidden>Chọn
                                                                {{ strtolower($sizeAttributes->name) }}</option>
                                                            @foreach ($sizeAttributes->attributes as $attribute)
                                                                <option value="{{ $attribute->id }}"
                                                                    {{ $variant->attribute_id == $attribute->id ? 'selected' : '' }}>
                                                                    {{ $attribute->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-item">
                                                        <label for="">Giá biến thể</label>
                                                        <input type="text" name="price_variant[]"
                                                            value="{{ $variant->price_variant }}" class="form-control">
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger remove-variant h-100 ml-2">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>


                                    <!-- Nút thêm biến thể -->
                                    <button type="button" id="add-variant"
                                        class="btn btn-primary d-flex align-items-center mt-3">
                                        <span><i class="fas fa-plus"></i></span>
                                        <span class="ml-2">Thêm biến thể</span>
                                    </button>
                                </div>

                                <!-- Hiển thị các nhóm thuộc tính khác (không có ô nhập giá) -->
                                <div class="col-12 mt-3 d-flex align-items-center flex-wrap">
                                    @foreach ($otherAttributeGroups as $group)
                                        <div class="form-group flex-grow-1 mr-2">
                                            <label>{{ $group->name }}</label>
                                            <select name="attributes[{{ $group->id }}][]" class="form-control">
                                                <option value="" hidden>Chọn {{ strtolower($group->name) }}</option>

                                                @foreach ($group->attributes as $attribute)
                                                    <option value="{{ $attribute->id }}" @selected($product->variants->contains('attribute_id', $attribute->id))>
                                                        {{ $attribute->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Mô tả</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-12">
                                    <textarea id="summernote" class="form-control" rows="20" name="description" placeholder="Nhập mô tả">{{ $product->description }}
                                     </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form thêm hình ảnh -->
                    <div class="col-md-4">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Thêm ảnh đại diện</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Chọn hình ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input image-input"
                                                name="product_image">
                                            <label class="custom-file-label">Chọn tệp</label>
                                        </div>
                                    </div>
                                    @error('product_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" name="delete_product_image" value="0">
                                <div
                                    class="container-img text-center position-relative {{ $product->product_image ? '' : 'd-none' }}">
                                    <img class="preview-image image_thumbnail rounded-2 img-fluid"
                                        src="{{ $product->product_image ? Storage::url($product->product_image) : '#' }}"
                                        alt="Xem trước hình ảnh">
                                    <button type="button"
                                        class="btn btn-danger remove-image position-absolute rounded-circle ">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card card-info ">
                            <div class="card-header">
                                <h3 class="card-title">Album Hình Ảnh</h3>
                            </div>
                            <div class="card-body album-container">
                                <div class="form-group">
                                    <label for="albumImage">Chọn album hình ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="album_images[]"
                                                id="albumImage" multiple>
                                            <label class="custom-file-label" for="albumImage">Chọn tệp</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div id="imagePreviewContainer" data-edit-mode="true">
                                        @foreach ($albumImages as $image)
                                            <div class="image-wrapper">
                                                <img src="{{ Storage::url($image->image_link) }}" alt="Product Image">

                                                <input type="checkbox" name="delete_images[]"
                                                    value="{{ $image->id }}" class="delete-checkbox" hidden>

                                                <button type="button" class="remove-image btn btn-danger">
                                                    <i class="fas fa-times-circle"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Thêm dòng hàng</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryImage">Chọn dòng hàng</label>
                                    <select name="jewelry_line_id" id="" class="form-control">
                                        <option value="" hidden selected>-- Dòng hàng --</option>
                                        @foreach ($jewelryLines as $id => $name)
                                            <option @selected($product->jewelry_line_id == $id) value="{{ $id }}">
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('jewelry_line_id')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Thêm bộ sưu tập mới</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Chọn bộ sưu tập</label>
                                    <select name="collection_id" id="" class="form-control">
                                        <option value="" hidden selected>-- Bộ sưu tập --</option>
                                        @foreach ($collections as $id => $name)
                                            <option @selected($product->collection_id == $id) value="{{ $id }}">
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Thao tác</h3>
                            </div>
                            <div class="card-body d-flex align-items-center">
                                <button type="submit" class="btn btn-outline-success d-flex align-items-center mr-2">
                                    <span><i class="fas fa-save"></i></span>
                                    <span class="ml-2">Cập nhật dữ liệu</span>
                                </button>
                                <button type="submit" class="btn btn-outline-danger d-flex align-items-center ">
                                    <span><i class="fas fa-undo"></i></span>
                                    <span class="ml-2">Reset</span>
                                </button>
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
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/simplemde/simplemde.min.css') }}">
@endpush
@push('script')
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/pages/function.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                height: 300,
            })

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let container = document.getElementById('variants-container');
            let addButton = document.getElementById('add-variant');
            let maxVariants = {{ count($sizeAttributes->attributes) }}; // Lấy số lượng thuộc tính từ PHP

            // Kiểm tra và tắt nút "Thêm" nếu đã đủ số dòng
            function checkAddButton() {
                if (container.children.length >= maxVariants) {
                    addButton.disabled = true; // Tắt nút nếu số dòng >= số thuộc tính
                } else {
                    addButton.disabled = false; // Bật nút nếu số dòng nhỏ hơn số thuộc tính
                }
            }

            addButton.addEventListener('click', function() {
                let newRow = document.createElement('div');
                newRow.classList.add('variant-row', 'd-flex', 'align-items-end', 'mb-2', 'g-2');

                newRow.innerHTML = `
             <div class="select-item flex-grow-1 mr-2">
                 <label>Size</label>
                 <select name="attributes[{{ $sizeAttributes->id }}][]" class="form-control">
                     <option value="" hidden selected>Chọn {{ strtolower($sizeAttributes->name) }}</option>
                     @foreach ($sizeAttributes->attributes as $attribute)
                         <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                     @endforeach
                 </select>
             </div>
             <div class="input-item">
                 <label for="">Giá biến thể</label>
                 <input type="text" name="price_variant[]" placeholder="Giá biến thể"
                 class="form-control">
             </div>
             <button type="button" class="btn btn-danger remove-variant h-100 ml-2">
                 <i class="fas fa-trash-alt"></i>
             </button>
         `;

                container.appendChild(newRow);
                checkAddButton();
            });

            container.addEventListener('click', function(e) {
                if (e.target.closest('.remove-variant')) {
                    e.target.closest('.variant-row').remove();
                    checkAddButton();
                }
            });

            checkAddButton();
        });
    </script>
@endpush
