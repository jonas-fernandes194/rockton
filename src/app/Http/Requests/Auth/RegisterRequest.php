<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'password_confirmation.required' => 'Confirmação de senha é obrigatória.',
            'password_confirmation.same' => 'As senhas não conferem.',
        ];
    }
}
