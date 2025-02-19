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
                                        @error('product_type_id')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Sản phẩm nổi bật</label>
                                        <select name="is_featured" class="form-control">
                                            <option value="0" {{ $product->is_featured == 0 ? 'selected' : '' }}>Mặc
                                                định
                                            </option>
                                            <option value="1" {{ $product->is_featured == 1 ? 'selected' : '' }}>
                                                Sản phẩm nổi bật
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
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
                            <div class="card-body ">
                                <div class="form-group col-12 size-variant">
                                    <div id="variants-container">
                                        @if ($sizeVariants->isEmpty())
                                            <div class="variant-row d-flex align-items-end mb-2 g-2">
                                                <div class="select-item flex-grow-1 mr-2">
                                                    <label>Size</label>
                                                    <select name="attributes[{{ $sizeAttributes->id }}][]"
                                                        class=" form-control">
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
                                                <div class="variant-row d-flex align-items-end mb-2 g-2"
                                                    data-variant-id="{{ $variant->id }}">
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
                                                        <label>Giá biến thể</label>
                                                        <input type="text"
                                                            name="price_variant[{{ $sizeAttributes->id }}][]"
                                                            value="{{ $variant->price_variant }}" class="form-control">
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger remove-variant h-100 ml-2">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                            <input type="hidden" name="delete_variants" id="delete_variants"
                                                value="">
                                            <input type="hidden" name="delete_all_variants" id="delete_all_variants"
                                                value="0">
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
                                    @error('album_images')
                                        <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
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
                                            <option @selected($product->brand_id == $id) value="{{ $id }}">
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
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
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('variants-container');
            const variantSection = document.querySelector('.size-variant');
            const addButton = document.getElementById('add-variant');
            const deleteVariantsInput = document.getElementById('delete_variants');
            const deleteAllVariantsInput = document.getElementById('delete_all_variants');
            const maxVariants = {{ count($sizeAttributes->attributes) }};
            let selectedSizes = new Set();
            let deletedVariants = [];

            // Các biến cho product type
            const categorySelect = document.querySelector('select[name="category_id"]');
            const productTypeSelect = document.querySelector('select[name="product_type_id"]');
            const validProductTypes = ["Nhẫn", "Vòng", "Dây chuyền", "Dây cổ", "Lắc"];

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

                // Chỉ disable nút thêm khi số lượng variant rows bằng maxVariants
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
                    deleteAllVariantsInput.value = show ? "0" : "1";
                }
            }

            container.addEventListener('click', function(e) {
                const removeButton = e.target.closest('.remove-variant');
                if (removeButton) {
                    const variantRow = removeButton.closest('.variant-row');
                    const variantId = variantRow.dataset.variantId;

                    if (variantId) {
                        deletedVariants.push(variantId);
                        deleteVariantsInput.value = deletedVariants.join(',');
                    }

                    variantRow.remove();
                    updateSizeOptions();
                    reindexVariants();
                }
            });

            function reindexVariants() {
                const variantRows = container.querySelectorAll('.variant-row');
                variantRows.forEach((row, index) => {
                    const priceInput = row.querySelector('input[name^="price_variant"]');
                    if (priceInput) {
                        priceInput.name = `price_variant[{{ $sizeAttributes->id }}][${index}]`;
                    }
                });
            }

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
                        <input type="text" 
                            name="price_variant[{{ $sizeAttributes->id }}][${variantCount}]" 
                            value=""
                            class="form-control" 
                            placeholder="Giá biến thể">
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

            productTypeSelect.addEventListener("change", function() {
                const selectedOption = this.options[this.selectedIndex];
                const selectedText = selectedOption ? selectedOption.text : '';
                const hasSize = checkProductTypeHasSize(selectedText);
                toggleVariantContainer(hasSize);
            });

            const selectedOption = productTypeSelect.options[productTypeSelect.selectedIndex];
            if (selectedOption) {
                const selectedText = selectedOption.text;
                const hasSize = checkProductTypeHasSize(selectedText);
                toggleVariantContainer(hasSize);
            }

            updateSizeOptions();
            reindexVariants();
        });
    </script>
@endpush
