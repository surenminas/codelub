<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'contact_name' => 'required|string',
            'contact_email' => 'required|string',
            'contact_message' => 'required|string',

        ];
    }

    public function messages()
    {
        return [
            'contact_name.required' => 'Required name',
            'contact_name.string' => 'Enter correct text',
            'contact_email.required' => 'Required email',
            'contact_email.string' => 'Enter correct email address',
            'contact_message.required' => 'Required text',
            'contact_message.string' => 'Enter correct text',

        ];
        
    }
}
