<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
            'title'=>'unique:news,title',
            'img'=>'dimensions:news,new_image',
        ];
    }

    public function messages()
    {
       return [
            'title.unique'=>'Title is duplicated!',
            // 'img.image'=>'Ảnh lỗi',
        ];
    }
}
