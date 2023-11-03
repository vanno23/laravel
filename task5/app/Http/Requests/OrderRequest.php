<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|integer',
            'items.*.quantity' => 'required|integer',
            'items.*.options' => 'array',
            'items.*.options.*' => 'string',
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
            'items.required' => 'The items array is required.',
            'items.array' => 'The items must be an array.',
            'items.min' => 'At least one item is required.',
            'items.*.product_id.required' => 'Each item must have a valid product ID.',
            'items.*.product_id.integer' => 'The product ID must be an integer.',
            'items.*.quantity.required' => 'Each item must have a valid quantity.',
            'items.*.quantity.integer' => 'The quantity must be an integer.',
            'items.*.options.array' => 'Item options must be an array.',
            'items.*.options.*.string' => 'Each option must be a string.',
        ];
    }
}
