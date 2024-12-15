<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'name.required' => 'نام محصول الزامی است',
            'name.max' => 'نام محصول باید حداکثر 255 کاراکتر باشد',
            'description.required' => 'توضیحات محصول الزامی است',
            'description.max' => 'توضیحات محصول باید حداکثر 255 کاراکتر باشد',
            'price.required' => 'قیمت محصول الزامی است',
            'price.numeric' => 'قیمت محصول باید عدد باشد',
            'image.required' => 'تصویر محصول الزامی است',
            'image.image' => 'تصویر محصول باید تصویر باشد',
            'image.mimes' => 'تصویر محصول باید از نوع jpeg,png,jpg,gif,svg باشد',
            'image.max' => 'سایز تصویر محصول باید حداکثر 2048 کیلوبایت باشد',
        ];

    }
}
