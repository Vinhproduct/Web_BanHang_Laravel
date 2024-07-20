<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z0-9]+$/u'],
            'email' => 'required',
            'password' => 'required',
            'phone' => [
                'required',
                'numeric',
                'digits:10'
            ],
            'address' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            // required
            'name.required' => 'Tên thành viên không để trống!',
            'email.required' => 'Email không để trống!',
            'password.required' => 'Password không để trống!',
            'address.required' => 'Nội dung không để trống!',
            'phone.required' => 'Số điện thoại không để trống!',
            'username.required' => 'Username không để trống!',
            // numeric
            'phone.numeric' => 'Vui lòng nhập kiểu số!',
            // digits
            'phone.digits' => 'Số điện thoại tối đa 10 số!',
            // alpha_dash
            'username.alpha_dash' => 'Giá trị chỉ chứa các ký tự chữ cái, số và dấu gạch dưới!',
            // regex
            'username.regex' => 'Giá trị chỉ chứa các ký tự không có dấu và ghi liền nhau!',
         ];
    }
}
