<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class authRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'password' => ['required', 'min:4']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên của bạn.',
            'name.min' => 'Tên của bạn phải có ít nhất 3 ký tự.',
            'password.required' => 'Vui lòng nhập mật khẩu của bạn.',
            'password.min' => 'Mật khẩu của bạn phải có ít nhất 4 ký tự.',
        ];
    }
}
