<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'password' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường  bắt buộc phải nhập',
            'name.min' => 'Username sản phảm không được nhỏ hơn  kí tự',
            'password.required' => 'Trường  bắt buộc phải nhập',
            'password.min' => 'Password không được nhỏ hơn min kí tự'
        ];
    }
}
