<?php

namespace App\Http\Requests\Admin\Album;

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
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Enter Name',
            'title.string' => 'Must be string',
            'image.required' => 'Image required',
            'image.image' => 'The image field must be an image',
            'image.max' => 'Image over 2MB',
        ];
    }
}
