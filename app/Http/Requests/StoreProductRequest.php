<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required',
            'detail' => 'required',
            'description' => 'required',
            'category_id' => [
                // 'integer',
                'not_in:0',
            ],
            'brand_id' => [
                // 'integer',
                'not_in:0',
            ],
            'price' => [
                'required',
                'numeric',
                'gt:pricesale', // phải lớn hơn pricesale
            ],
            'pricesale' => [
                'required',
                'numeric',
                'lt:price',
            ],
            'qty' => [
                'required',
                'numeric',
                'gte:0',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            // required
            'name.required' => 'Tên sản phẩm không để trống!',
            'detail.required' => 'Chi tiết sản phẩm không để trống!',
            'description.required' => 'Mô tả sản phẩm không để trống!',
            'price.required' => 'Giá sản phẩm không để trống!',
            'pricesale.required' => 'Giá ưu đãi của sản phẩm không để trống!',
            'qty.required' => 'Số lượng của sản phẩm không để trống!',
            // not_in
            'category_id.not_in' => 'Vui lòng chọn danh mục!',
            'brand_id.not_in' => 'Vui lòng chọn thương hiệu!',
            // numeric
            'price.numeric' => 'Vui lòng nhập số!',
            'pricesale.numeric' => 'Vui lòng nhập số!',
            'qty.numeric' => 'Vui lòng nhập số!',
            // gt
            'price.gt' => 'Giá phải lớn hơn sale price!',
            // lt
            'pricesale.lt' => 'Sale price phải nhỏ hơn price!',
            // gte
            'qty.gte' => 'Phải >=0',
        ];
    }
}
