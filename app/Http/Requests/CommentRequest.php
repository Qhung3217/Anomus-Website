<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment-field' => 'required',
            'sign' => 'max:10'
        ];
    }

    public function messages()
    {
        return [
            'comment-field.required' => 'Vui lòng nhập nội dung',
            'sign.max' => 'Chũ ký tối da 10 kí tự',
        ];
    }
}
