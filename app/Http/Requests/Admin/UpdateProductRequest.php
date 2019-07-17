<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'name' => [
                'required',
                'max:191',
                Rule::unique('products')->ignore($this->id)
            ],
            'image' => 'nullalbe|mimes:png,jpg,jpeg|max:2000',
            'slug' =>  [
                'required',
                'max:191',
                Rule::unique('products')->ignore($this->id)
            ],
            'price' => 'nullable|numeric|max:1000000000',
            'sale_price' => 'nullable|numeric|lt:price',
            'meta_title' => 'nullable|max:191',
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'Vui lòng chỉ chọn file jp,png,jpeg',
            'image.max' => 'Vui lòng không chọn file quá 2MB',
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm này đã được sử dụng',
            'name.max' => 'Vui lòng không nhập quá 191 ký tự',
            'slug.required' => 'Vui lòng nhập slug sản phẩm',
            'slug.unique' => 'Slug sản phẩm này đã được sử dụng',
            'slug.max' => 'Vui lòng không nhập quá 191 ký tự',
            'price.numeric' => 'Vui lòng chỉ nhập số',
            'price.max' => 'Giá tiền không được vượt quá 1000000000',
            'sale_price.numeric' => 'Vui lòng chỉ nhập số',
            'sale_price.lt' => 'Giá khuyến mãi không được lớn hơn giá gốc',
            'meta_title' => 'Vui lòng không nhập quá 191 ký tự'
        ];
    }
}
