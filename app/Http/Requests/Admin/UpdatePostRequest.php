<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'image' => 'nullable|mimes:jpg,png,jpeg|max:2000',
            'title' => [
                'required',
                'max:191',
                Rule::unique('posts')->ignore($this->id)
            ],
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'Vui lòng chỉ chọn file jp,png,jpeg',
            'image.max' => 'Vui lòng không chọn file quá 2MB',
            'title.required' => 'Vui lòng nhập tiêu đề bài viết',
            'title.unique' => 'Tiêu đề bài viết này đã được sử dụng',
            'title.max' => 'Vui lòng không nhập quá 191 ký tự',
            'body.required' => 'Vui lòng nhập nội dung'
        ];
    }
}
