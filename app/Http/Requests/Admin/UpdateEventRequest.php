<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEventRequest extends FormRequest
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
            'title' => [
                'required',
                'max:191',
                Rule::unique('events')->ignore($this->id)
            ],
            'body' => 'required',
            'start_at' => 'required',
            'end_at' => 'required|after_or_equal:start_at',
            'address' => 'required|max:191',
            'link' => 'nullable|max:191',
            'organizer_name' => 'nullable|max:191',
            'organizer_phone' => 'nullable|numeric',
            'organizer_email' => 'nullable|email|max:191'
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'Vui lòng chỉ chọn file jpg,jpeg,png',
            'image.max' => 'Vui lòng chỉ chọn file nhỏ hơn 2MB',
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.max' => 'Vui lòng không nhập quá 191 ký tự',
            'title.unique' => 'Tiêu đề này đã được sử dụng',
            'body.required' => 'Vui lòng nhập nội dung',
            'start_at.required' => 'Vui lòng chọn thời gian bắt đầu',
            'end_at.required' => 'Vui lòng chọn giời gian kết thúc',
            'end_at.after_or_equal' => 'Thời gian kết thúc phải sau thời gian bắt đầu',
            'address.required' => 'Vui lòng nhập địa điểm',
            'address.max' => 'Vui lòng không nhập quá 191 ký tự',
            'link.max' => 'Vui lòng không nhập quá 191 ký tự',
            'organizer_name.max' => 'Vui lòng không nhập quá 191 ký tự',
            'organizer_phone.numeric' => 'Vui lòng chỉ nhập số',
            'organizer_email.email' => 'Vui lòng nhâp đúng định dạng email',
            'organizer_email.max' => 'Vui lòng không nhập quá 191 ký tự'
        ];
    }

}
