<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:200'],
            'public_name' => ['required', 'max:200'],
            'cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048']
        ];
    }
}
