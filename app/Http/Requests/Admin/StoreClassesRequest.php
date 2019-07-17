<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassesRequest extends FormRequest
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
            'image' => 'required|mimes:jpg,jpeg,png|max:2000',
            'name' => 'required|max:191|unique:classes',
            'body' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'image.required' => 'Vui lòng chọn ảnh',
          'image.mimes' => 'Vui lòng chọn file jpg, jpeg, png',
          'image.max' => 'Vui lòng không chọn file quá 2MB',
          'name.required' => 'Vui lòng nhập tên lớp',
          'name.max' => 'Vui lòng không nhập quá 191 ký tự',
          'name.unique' => 'Tên này đã được sử dụng'
        ];
    }
}
