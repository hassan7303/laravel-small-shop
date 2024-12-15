<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'somtime|nallable|string|max:255',
            'description' => 'somtime|nallable|string|max:255',
            'price' => 'somtime|nallable|numeric',
            'image' => 'somtime|nallable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * 
     * @return array<string, string>
     */
    public function messages():array 
    {
        return [
            'name.string' => 'نام محصول باید یک متن باشد',
            'name.max' => 'نام محصول حداکثر 255 کاراکتر می باشد',
            'description.string' => 'توضیحات محصول باید یک متن باشد',
            'description.max' => 'توضیحات محصول حداکثر 255 کاراکتر می باشد',
            'price.numeric' => 'قیمت محصول باید عدد باشد',
            'image.image' => 'فایل انتخاب شده یک تصویر باشد',
            'image.mimes' => 'فایل انتخاب شده باید از نوع jpeg,png,jpg,gif,svg باشد',
        ];
    }
}
