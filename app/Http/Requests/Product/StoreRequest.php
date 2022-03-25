<?php

namespace App\Http\Requests\Product;

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
            'name' => 'required|unique:products|max:255',
            'price' => 'required|max:255',
            'image' => 'required|max:255',
            'image_list' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'price.required' => 'Không được để trống giá sản phẩm',
            'image.required' => 'Vui lòng tải lên hình ảnh đại diện của sản phẩm',
            'image_list.required' => 'Vui lòng tải lên hình ảnh chi tiết của sản phẩm',
            'description.required' => 'Không được để trống nội dung sản phẩm',
        ];
    }
}
