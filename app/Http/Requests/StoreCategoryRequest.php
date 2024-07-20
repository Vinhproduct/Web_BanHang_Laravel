<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required|min:6'
        ];
    }
    public function messages():array
    {
        return [
            'name.required'=>'Tên danh mục không được bỏ trống!',
            'name.min'=>'Tên danh mục ít nhất 5 kí tự'
        ];
    }
}
