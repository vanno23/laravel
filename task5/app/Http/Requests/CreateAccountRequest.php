<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class CreateAccountRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            // Include other validation rules for additional attributes if needed.
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Check if the "password" input field exists and is not empty.
        if ($this->has('password') && !empty($this->input('password'))) {
            // Hash the password using Laravel's Hash::make function.
            $this->merge([
                'password' => Hash::make($this->input('password')),
            ]);
        }
    }
}
