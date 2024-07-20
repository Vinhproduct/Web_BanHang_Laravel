<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'detail' => 'required',
            'description' => 'required',
            'topic_id' => [
                // 'integer',
                'not_in:0',
            ]
        ];
    }
    public function messages(): array
    {
        return [
            // required
            'title.required' => 'Tiêu đề bài viết không để trống!',
            'detail.required' => 'Chi tiết bài viết không để trống!',
            'description.required' => 'Mô tả bài viết không để trống!',
            // not_in
            'topic_id.not_in' => 'Vui lòng chọn đề tài!',
        ];
    }
}
