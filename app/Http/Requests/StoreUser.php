<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'email' => 'required|string|max:255',
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
            'name.required' => 'نام الزامی است',
            'name.max' => 'نام حداکثر 255 کاراکتر می باشد',
            'name.string' => 'نام باید از نوع رشته باشد',
            'email.required' => 'ایمیل الزامی است',
            'email.max' => 'ایمیل حداکثر 255 کاراکتر می باشد',
            'email.string' => 'ایمیل باید از نوع رشته باشد',    
        ];

    }
}
