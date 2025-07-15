<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BandaRequest extends FormRequest
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
            $rules['member_id'] = ['required', 'array', 'min:2'];
            $rules['name'] = ['required', 'min:3', 'max:100'];
            $rules['cover'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'];
            $rules['photo'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'];
            $rules['description'] = ['nullable', 'min:10', 'max:3000'];
        }
        
        return $rules;
    }
}
