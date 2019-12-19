<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
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
     * Available Validation Rules
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'unique:type_products,cate_name',
            'img'=>'dimensions:type_products,cate_image',
        ];
    }

    public function messages()
    {
       return [
            'name.unique'=>'Category name has been duplicated!',
            // 'img.image'=>'Ảnh lỗi',
        ];
    }
}
