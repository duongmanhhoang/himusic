<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTypeClass extends FormRequest
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
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2000',
            'name' => [
                'required',
                'max:191',
                Rule::unique('type_classes')->ignore($this->id),
            ],
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'Vui lòng chỉ chọn file jpg,jpeg,png',
            'image.max' => 'Vui lòng chỉ chọn file nhỏ hơn 2MB',
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Vui lòng không nhập quá 191 ký tự',
            'name.unique' => 'Tên này đã được sử dụng',
            'description.required' => 'Vui lòng nhập nội dung',
        ];
    }
}
