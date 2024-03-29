<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRegisterRequest extends FormRequest
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
            'name' => ['required' , 'unique:users,name'],
            'email' => ['required' , 'email', 'unique:users,email'],
            'mobile' =>['required', 'unique:users,mobile'],
            'password' => ['required'],
            'g-recaptcha-response' => ['required']
        ];
    }
}
