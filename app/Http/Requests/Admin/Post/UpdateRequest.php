<?php

namespace App\Http\Requests\Admin\Post;

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
            'content' => 'required|string',
            'image' => 'nullable|file',
            'image_preview' => 'nullable|file',
            'category' => 'required|exists:categories,id',
            'tags' =>'nullable|array',
            'tags.*' =>'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Enter title',
            'title.string' => 'Must be string',
            'content.required' => 'Enter content ',
            'image.required' => 'Choose image ',
            'image.mimes' => 'This not image',
            'image_preview.required' => 'Choose image ',
            'image_preview.mimes' => 'This not image',
            'category.required' => 'Choose category',
            'category.exists' => 'Category not exist',
            'tags.integer' => 'Tag not number',

        ];
    }
}
