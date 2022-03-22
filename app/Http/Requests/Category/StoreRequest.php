<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:categories|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
        ];
    }
}
