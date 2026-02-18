<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'photo' => $this->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048':'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover' => $this->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048':'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required',
            'description' => 'nullable|string|min:10|max:1000',
        ];
    }
}