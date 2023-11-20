<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,' . $this->user->id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer'

        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Enter Name',
            'name.string' => 'Enter correct name',
            'email.required' => 'Enter email',
            'email.string' => 'Enter correct email',
            'email.email' => 'Enter correct email',
            'role.required' => 'Select role',
            'role.integer' => 'Role must be number'
        ];
    }
}
