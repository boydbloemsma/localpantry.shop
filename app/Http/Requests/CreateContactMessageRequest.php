<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'email'],
            'message' => ['required', 'string', 'min:16', 'max:255'],
            'honeypot' => ['nullable', 'prohibited'],
        ];
    }
}
