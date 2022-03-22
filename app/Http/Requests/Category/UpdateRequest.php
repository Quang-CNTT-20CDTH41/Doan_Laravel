<?php

namespace App\Http\Requests\Category;

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
            'name' => 'required|max:255|unique:categories,name,' . request()->id,
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
