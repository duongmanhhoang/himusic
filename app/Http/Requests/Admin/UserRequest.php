<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'max:191',
                Rule::unique('users')->ignore($this->id)
            ],
            'name' => 'max:191',
            'password' => 'required|confirmed|min:6|max:15',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.max' => 'Vui lòng không nhập quá 191 ký tự',
            'email.unique' => 'Email này đã được sử dụng',
            'name.max' => 'Vui lòng không nhập quá 191 ký tự',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu và mật khẩu nhập lại không khớp',
            'password.min' => 'Vui lòng nhập nhiều hơn 6 ký tự',
            'password.max' => 'Vui lòng không nhập quá 15 ký tự',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu'
        ];
    }
}
