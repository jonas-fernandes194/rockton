<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\Musico\StatusMusico;

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
            $rules['cover'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'];
            $rules['photo'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'];
            $rules['description'] = ['nullable', 'min:10', 'max:3000'];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['name'] = ['nullable', 'min:3', 'max:200'];
            $rules['cover'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'];
            $rules['photo'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'];
            $rules['description'] = ['nullable', 'min:10', 'max:3000'];
            $rules['status'] = ['required', new Enum(StatusMusico::class)];
        }
        return $rules;
    }
}
