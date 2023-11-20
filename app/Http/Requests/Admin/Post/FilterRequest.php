<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'title' => 'string',
            'category_id' => 'nullable|integer',
            'tags' => 'nullable|array',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'Enter title',
            'category.exists' => 'Category not exist',
            'tags.exists' => 'Tag not exist',

        ];
    }
}
