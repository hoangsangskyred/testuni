<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Vui lòng cho biết Họ và tên',
            'email.required' => 'Email không hợp lệ',
            'phone.required' => 'Vui lòng cho biết số điện thoại'
        ];
    }

}
