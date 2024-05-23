<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:product',
            'desc' => 'required',
            'brandID' => 'required',
            'typeBrandID' => 'required',
            'categoryID' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trường tên sản phẩm bắt buộc',
            'name.unique' => 'Trường tên sản phẩm đã tồn tại',
            'desc.required' => 'Trường mô tả không được bỏ trống',
            'brandID.required' => 'Trường này bắt buộc',
            'typeBrandID.required' => 'Trường này bắt buộc',
            'categoryID.required' => 'Trường này bắt buộc',
        ];
    }
}
