<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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
    // public function rules()
    // {
    //     return [
    //         'name' => 'required|max:225',
    //         'price' => 'required|numeric',
    //     ];
    // }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Name bắt buộc phải nhập',
    //         'name.max:225' => 'Name ko dc vượt quá 225 kí tự',
    //         'price.required' => 'Price bắt buộc phải nhập',
    //         'price.numeric' => 'Price phải là numeric'
    //     ];
    // }

    // public function withValidator(Validator $validator): void
    // {
    //     $validator->after(function (Validator $validator) {
    //         if ($validator->errors()->count() > 0) {
    //             $validator->errors()->add('msg', 'Something is wrong with fields');
    //         }
    //     });
    // }

    // public function prepareForValidation()
    // {
    //     $this->merge([
    //         "create_at" => date('Y-m-d H:i:s')
    //     ]);
    // }

    // public function failedAuthorization()
    // {
    //     // throw new AuthorizationException('del co quyen tury cap');\
    //     echo 1;
    // }
}
