<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email,' . request()->id,
            'phone' => 'required|unique:users,phone, ' . request()->id,
            'address' => 'required',
            'birthday' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống tên',
            'name.unique' => 'Không được để trống tên',
            'email.required' => 'Không được để trống email',
            'email.unique' => 'Email không được trùng',
            'phone.required' => 'Không được để trống số điện thoại',
            'phone.unique' => 'Số điện thoại không được trùng',
            'address.required' => 'Không được để trống địa chỉ',
            'birthday.required' => 'Không được để trống ngày sinh',
        ];
    }
}
