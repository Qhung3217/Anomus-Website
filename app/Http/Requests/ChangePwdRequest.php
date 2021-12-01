<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePwdRequest extends FormRequest
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
            'pwd' => 'required',
            'newpwd' => 'required|min:8|max:16',
            'newpwd2' => 'required',
        ];
    }

    public function messages(){
        return [
            'pwd.required' => 'Vui lòng nhập mật khẩu cũ',
            'newpwd.required' => 'Vui lòng nhập mật khẩu mới',
            'newpwd2.required' => 'Vui lòng nhập xác nhận mật khẩu mới',
            'newpwd.min' => 'Mật khẩu mới phải có ít nhất 8 kí tự, tối đa 16 kí tự',
            'newpwd.max' => 'Mật khẩu mới phải có ít nhất 8 kí tự, tối đa 16 kí tự',
        ];
    }
}
