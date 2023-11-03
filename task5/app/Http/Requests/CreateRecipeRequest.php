<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ingredients' => 'required|array|min:1',
            'ingredients.*.name' => 'required|string',
            'ingredients.*.quantity' => 'required|integer',
            'ingredients.*.notes' => 'string|nullable',
        ];
    }
    

        /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'ingredients.required' => 'At least one ingredient is required.',
            'ingredients.array' => 'Ingredients must be an array.',
            'ingredients.min' => 'At least one ingredient is required.',
            'ingredients.*.name.required' => 'Ingredient name is required.',
            'ingredients.*.name.string' => 'Ingredient name must be a string.',
            'ingredients.*.quantity.required' => 'Ingredient quantity is required.',
            'ingredients.*.quantity.integer' => 'Ingredient quantity must be an integer.',
            'ingredients.*.notes.string' => 'Ingredient notes must be a string.',
        ];
    }
}
