<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'usr' => 'required',
            'pwd' => 'required',
        ];
    }

    public function messages(){
        return [
            'usr.required' => "Vui lòng nhập tài khoản",
            'pwd.required' => "Vui lòng nhập mật khẩu",
        ];
    }
}
