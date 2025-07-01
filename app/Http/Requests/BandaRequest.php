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
            $rules['musico_id'] = ['required'];
            $rules['name'] = ['required', 'min:3', 'max:100'];
        }
        
        return $rules;
    }
}
