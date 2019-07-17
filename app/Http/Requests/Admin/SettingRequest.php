<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'logo' => 'nullable|mimes:jpeg,jpg,png|max:2000',
            'email' => 'email|max:191',
            'phone' => 'nullable|numeric|digits_between:0,15',
            'address' => 'max:191',
            'websites' => 'max:191',
            'facebook' => 'max:191',
            'instagram' => 'max:191',
            'youtube' => 'max:191'
        ];
    }

    public function messages()
    {
        return [
            'logo.max' => 'Vui lòng không tải ảnh quá 2MB',
            'logo.mimes' => 'Chỉ chấp nhận định dạng file jpeg,jpg,png',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.max' => 'Vui lòng không nhập quá 191 ký tự',
            'phone.numeric' => 'Vui lòng chỉ nhập số',
            'phone.digits_between' => 'Vui lòng không nhập quá 15 ký tự',
            'address.max' => 'Vui lòng không nhập quá 191 ký tự',
            'websites.max' => 'Vui lòng không nhập quá 191 ký tự',
            'facebook.max' => 'Vui lòng không nhập quá 191 ký tự',
            'instagram.max' => 'Vui lòng không nhập quá 191 ký tự',
            'youtube.max' => 'Vui lòng không nhập quá 191 ký tự'
        ];
    }
}
