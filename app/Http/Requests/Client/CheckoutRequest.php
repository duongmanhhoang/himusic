<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'receiver_name' => 'required|max:191',
            'receiver_email' => 'required|max:191|email',
            'receiver_phone' => 'required|numeric|digits_between:1,13',
            'receiver_address' => 'required|max:191',
        ];
    }

    public function messages()
    {
        return [
            'receiver_name.required' => 'Vui lòng nhập tên',
            'receiver_name.max' => 'Vui lòng không nhập quá 191 ký tự',
            'receiver_email.required' => 'Vui lòng không bỏ trống email',
            'receiver_email.max' => 'Vui lòng không nhập quá 191 ký tự',
            'receiver_email.email' => 'Vui lòng nhập đúng định dạng email',
            'receiver_phone.required' => 'Vui lòng nhập số điện thoại',
            'receiver_phone.numeric' => 'Vui lòng chỉ nhập số',
            'receiver_phone.digits_between' => 'Số điện thoại không hợp lệ',
            'receiver_address.required' => 'Vui lòng nhập địa chỉ',
            'receiver_address.max'  => 'Vui lòng không nhập quá 191 ký tự'

        ];
    }
}
