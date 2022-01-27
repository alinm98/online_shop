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
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>['required' ,'unique:products,name'],
            'price' =>['required' ,'integer' , 'min:1000'],
            'description' =>['required'],
            'image' =>['required' ,'mimes:png,jpg,peg,mpeg' , 'min:1' ,'max:2000'],
            'category_id'=>['required','exists:categories,id'],
            'brand_id'=>['required','exists:brands,id'],
        ];
    }
}
