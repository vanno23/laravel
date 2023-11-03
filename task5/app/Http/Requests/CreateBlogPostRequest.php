<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Set authorization logic based on your application requirements.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:blog_posts|max:255',
            'content' => 'required|string|min:500',
            // Include other validation rules for additional attributes if needed.
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'title.unique' => 'The title must be unique and meaningful.',
            'title.max' => 'The title must not exceed 255 characters.',
            'content.required' => 'The content is required.',
            'content.string' => 'The content must be a string.',
            'content.min' => 'The content must be a well-written article with a minimum of 500 words.',
        ];
    }
}
