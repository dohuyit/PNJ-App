@extends('backend.layouts.app')

@section('title', 'Thêm sản phẩm mới')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm sản phẩm mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm sản phẩm mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                                            placeholder="Nhập tên sản phẩm" value="{{ old('product_name') }}">
                                        @error('product_name')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Giá sản phẩm</label>
                                        <div class="input-group d-flex align-items-center">
                                            <input type="text" class="form-control" name="original_price"
                                                placeholder="Giá gốc sản phẩm" value="{{ old('original_price') }}">
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
                                                placeholder="Giá khuyến mãi" value="{{ old('sale_price') }}">
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
                                                <option value="{{ $id }}">{{ $name }}</option>
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
                                            {{-- @foreach ($productTypes as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('product_type_id')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Sản phẩm nổi bật</label>
                                        <select name="is_featured" class="form-control">
                                            <option value="0" {{ old('is_featured') == 0 ? 'selected' : '' }}>Sản phẩm
                                                nổi bật
                                            </option>
                                            <option value="1" {{ old('is_featured', 1) == 1 ? 'selected' : '' }}>
                                                Mặc định
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Trạng thái sản phẩm</label>
                                        <select name="product_status" class="form-control">
                                            <option value="0" {{ old('product_status', 0) == 0 ? 'selected' : '' }}>
                                                Còn
                                                hàng
                                            </option>
                                            <option value="1" {{ old('product_status') == 1 ? 'selected' : '' }}>Hết
                                                hàng
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
                                <div class="form-group col-12 size-variant">
                                    <div id="variants-container">
                                        <div class="variant-row d-flex align-items-end mb-2 g-2">
                                            <div class="select-item flex-grow-1 mr-2">
                                                <label>Size</label>
                                                <select name="attributes[{{ $sizeAttributes->id }}][]"
                                                    class="form-control">
                                                    <option value="" hidden selected>Chọn
                                                        {{ strtolower($sizeAttributes->name) }}</option>
                                                    @foreach ($sizeAttributes->attributes as $attribute)
                                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}
                                                        </option>
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
                                        </div>
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
                                                <option value="" hidden selected>Chọn {{ strtolower($group->name) }}
                                                </option>
                                                @foreach ($group->attributes as $attribute)
                                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach

                                </div>
                                @error('attributes')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">Mô tả</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-12">
                                    <textarea id="summernote" class="form-control" rows="20" name="description" placeholder="Nhập mô tả">{{ old('description') }}
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
                                <div class="container-img text-center position-relative d-none">
                                    <img class="preview-image image_thumbnail rounded-2 img-fluid" src="#"
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
                                    <div id="imagePreviewContainer"></div>
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
                                            <option value="{{ $id }}">{{ $name }}</option>
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
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('collection_id')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Thương hiệu</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Chọn thương hiệu</label>
                                    <select name="brand_id" id="" class="form-control">
                                        <option value="" hidden selected>-- Thương hiệu --</option>
                                        @foreach ($brands as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('collection_id')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
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
                                    <span class="ml-2">Thêm mới dữ liệu</span>
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
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/simplemde/simplemde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/add.css') }}">
@endpush
@push('script')
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/pages/function.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Các biến cho variant size
            const container = document.getElementById('variants-container');
            const variantSection = document.querySelector('.size-variant');
            const addButton = document.getElementById('add-variant');
            const maxVariants = {{ count($sizeAttributes->attributes) }};
            let selectedSizes = new Set();

            // Các biến cho product type
            const categorySelect = document.querySelector('select[name="category_id"]');
            const productTypeSelect = document.querySelector('select[name="product_type_id"]');
            const validProductTypes = ["Nhẫn", "Vòng", "Dây chuyền", "Dây cổ", "Lắc"];

            // Ẩn khối size ngay khi trang load
            if (variantSection) {
                variantSection.style.display = 'none';
            }

            // Summernote initialization
            $('#summernote').summernote({
                height: 300
            });

            function updateSizeOptions() {
                const allSelects = container.querySelectorAll(
                    `select[name^="attributes[{{ $sizeAttributes->id }}]"]`);
                selectedSizes.clear();

                // Cập nhật selectedSizes từ các select hiện tại
                allSelects.forEach(select => {
                    if (select.value) {
                        selectedSizes.add(select.value);
                    }
                });

                // Cập nhật trạng thái disabled cho tất cả các select
                allSelects.forEach(select => {
                    Array.from(select.options).forEach(option => {
                        if (option.value) { // Bỏ qua option placeholder
                            const isCurrentlySelected = select.value === option.value;
                            option.disabled = selectedSizes.has(option.value) && !
                                isCurrentlySelected;
                        }
                    });
                });

                // Kiểm tra và cập nhật trạng thái nút thêm
                addButton.disabled = container.querySelectorAll('.variant-row').length >= maxVariants;
            }

            function checkProductTypeHasSize(productTypeName) {
                if (!productTypeName) return false;
                const normalizedName = productTypeName.trim();
                return validProductTypes.includes(normalizedName) || normalizedName.endsWith("cưới");
            }

            function toggleVariantContainer(show) {
                if (variantSection) {
                    variantSection.style.display = show ? "block" : "none";
                }
            }

            // Xử lý sự kiện click để xóa variant
            container.addEventListener('click', function(e) {
                if (e.target.closest('.remove-variant')) {
                    e.target.closest('.variant-row').remove();
                    updateSizeOptions();
                }
            });

            // Xử lý sự kiện thêm variant mới
            addButton.addEventListener('click', function() {
                const variantCount = container.querySelectorAll('.variant-row').length;
                const newRow = document.createElement('div');
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
                        <label>Giá biến thể</label>
                        <input type="text" name="price_variant[]" placeholder="Giá biến thể" class="form-control">
                    </div>
                    <button type="button" class="btn btn-danger remove-variant h-100 ml-2">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                `;

                container.appendChild(newRow);
                const newSelect = newRow.querySelector('select');
                newSelect.addEventListener('change', updateSizeOptions);
                updateSizeOptions();
            });

            // Xử lý sự kiện thay đổi category
            categorySelect.addEventListener("change", function() {
                const categoryId = this.value;
                if (!categoryId) {
                    productTypeSelect.innerHTML = '<option value="">-- Loại sản phẩm --</option>';
                    return;
                }

                fetch(`/admin/get-product-types/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        productTypeSelect.innerHTML = '<option value="">-- Loại sản phẩm --</option>';
                        data.forEach(productType => {
                            productTypeSelect.innerHTML +=
                                `<option value="${productType.id}">${productType.name}</option>`;
                        });
                    })
                    .catch(error => console.error("Lỗi khi lấy loại sản phẩm:", error));
            });

            // Xử lý sự kiện thay đổi product type
            productTypeSelect.addEventListener("change", function() {
                const selectedOption = this.options[this.selectedIndex];
                const selectedText = selectedOption ? selectedOption.text : '';
                const hasSize = checkProductTypeHasSize(selectedText);
                toggleVariantContainer(hasSize);
            });

            // Khởi tạo trạng thái ban đầu của product type
            const selectedOption = productTypeSelect.options[productTypeSelect.selectedIndex];
            if (selectedOption) {
                const selectedText = selectedOption.text;
                const hasSize = checkProductTypeHasSize(selectedText);
                toggleVariantContainer(hasSize);
            }

            // Khởi tạo các options và trạng thái ban đầu
            updateSizeOptions();
        });
    </script>
@endpush
