<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateTestimonialRequest extends FormRequest
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
            'detail' => 'required'
        ];
    }

    public function messages()
    {
        return
        [
            'image.required' => 'Vui lòng chọn ảnh',
            'image.mimes' => 'Vui lòng chỉ chọn file địng dạng jpg,jpeg,png',
            'image.max' => 'Vui lòng chọn ảnh dung lượng dưới 2MB',
            'detail.required' => 'Vui lòng nhập nội dung'
        ];
    }
}
