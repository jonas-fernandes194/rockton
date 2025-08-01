<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicaRequest extends FormRequest
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
            $rules['title'] = ['required', 'min:3', 'max:200'];
            $rules['band_id'] = ['required'];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['title'] = ['required', 'min:3', 'max:200'];
            $rules['band_id'] = ['required'];
        }

        return $rules;
    }
}
