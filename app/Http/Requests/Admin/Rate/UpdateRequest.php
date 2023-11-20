<?php

namespace App\Http\Requests\Admin\Rate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

   /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'country' => 'required|string',
            'currency' => 'required|min:3|max:3',
        ];
    }

    public function messages()
    {
        return [
            'country.required' => 'Enter Name',
            'country.string' => 'Must be string',
            'currency.required' => 'Enter Name',
            'currency.string' => 'Must be string',
            'currency.min' => 'Must be uppercase and 3 symbole min',
            'currency.max' => 'Must be uppercase and 3 symbole max',
        ];
    }
}
