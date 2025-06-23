<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        if ($this->isMethod('post')) 
        {
            $rules['name'] = ['required', 'min:3', 'max:200'];
            $rules['public_name'] = ['required', 'min:3', 'max:200'];
            $rules['cover'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['name'] = ['nullable', 'min:3', 'max:200'];
            $rules['public_name'] = ['nullable', 'min:3', 'max:200'];
            $rules['cover'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'];
        }
        return $rules;
    }
}
