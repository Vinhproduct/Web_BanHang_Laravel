<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'title' => 'required',
            'content' => 'required',
            'user_id' => [
                // 'integer',
                'not_in:0',
            ],
            'phone' => [
                'required',
                'numeric',
                'digits:10'
            ]
        ];
    }
    public function messages(): array
    {
        return [
            // required
            'name.required' => 'Tên người liên hệ không để trống!',
            'email.required' => 'Email không để trống!',
            'title.required' => 'Tiêu đề không để trống!',
            'content.required' => 'Nội dung không để trống!',
            'phone.required' => 'Số điện thoại không để trống!',
            // not_in
            'user_id.not_in' => 'Vui lòng chọn user!',
            // numeric
            'phone.numeric' => 'Vui lòng nhập kiểu số!',
            // digits
            'phone.digits' => 'Số điện thoại tối đa 10 số!',
         ];
    }
}
