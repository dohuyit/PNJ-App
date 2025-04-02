<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validate sản phẩm
            'product_name' => 'required|string|max:255',
            'original_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:original_price',
            'description' => 'nullable|string',
            'category_id' => 'required',
            'jewelry_line_id' => 'nullable',
            'collection_id' => 'nullable|exists:collections,id',
            'product_type_id' => 'required|exists:product_types,id',

            // Validate ảnh sản phẩm
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // Validate biến thể
            'attributes' => 'required|array',
            // 'attributes.*' => 'required|array',
            // 'attributes.*.*' => 'required|exists:attributes,id',

            // 'price_variant' => 'array',
            // 'price_variant.*' => 'numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên sản phẩm không được để trống.',
            'original_price.required' => 'Giá gốc không được để trống.',
            'original_price.numeric' => 'Giá gốc phải là số.',
            'sale_price.numeric' => 'Giá bán phải là số.',
            'sale_price.lte' => 'Giá bán phải nhỏ hơn hoặc bằng giá gốc.',
            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm.',
            'product_type_id.required' => 'Vui lòng chọn loại sản phẩm.',
            'product_image.image' => 'Ảnh phải có định dạng jpeg, png, jpg, webp',
            'product_image.max' => 'Ảnh tối đa 2MB.',

        ];
    }
}
