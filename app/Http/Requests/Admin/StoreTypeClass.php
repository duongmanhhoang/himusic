<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeClass extends FormRequest
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
            'name' => 'required|max:191|unique:type_classes',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Vui lòng chọn ảnh cho danh mục',
            'image.mimes' => 'Vui lòng chỉ chọn file jpg,jpeg,png',
            'image.max' => 'Vui lòng chỉ chọn file nhỏ hơn 2MB',
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Vui lòng không nhập quá 191 ký tự',
            'name.unique' => 'Tên này đã được sử dụng',
            'description.required' => 'Vui lòng nhập nội dung',
        ];
    }
}
