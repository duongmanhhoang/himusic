<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClassesRequest extends FormRequest
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
                Rule::unique('classes')->ignore($this->id)
            ],
            'body' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'Vui lòng chọn file jpg, jpeg, png',
            'image.max' => 'Vui lòng không chọn file quá 2MB',
            'name.required' => 'Vui lòng nhập tên lớp',
            'name.max' => 'Vui lòng không nhập quá 191 ký tự',
            'name.unique' => 'Tên này đã được sử dụng'
        ];
    }
}
