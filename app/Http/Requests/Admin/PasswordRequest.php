<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6|max:15',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Vui lòng nhập mật khẩu cũ',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu và mật khẩu nhập lại không khớp',
            'password.min' => 'Vui lòng nhập nhiều hơn 6 ký tự',
            'password.max' => 'Vui lòng không nhập quá 15 ký tự',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu'
        ];
    }
}
