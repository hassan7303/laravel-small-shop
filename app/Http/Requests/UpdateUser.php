<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'email' => 'somtime|nallable|string|max:255',
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
            'name.string' => 'نام باید یک متن باشد',
            'name.max' => 'نام حداکثر 255 کاراکتر باشد',
            'email.string' => 'ایمیل باید یک متن باشد',
            'email.max' => 'ایمیل حداکثر 255 کاراکتر باشد',
        ];
    }
}
