<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CreateStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        // todo
        // return Gate::allows('create-store');
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:100'],
            'description' => [
                'nullable',
                'string',
                'min:5',
                'max:255',
            ],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->any()) {
                    return;
                }

                if ($this->user()->store()->count() >= 1) {
                    $validator->errors()->add(
                        'name',
                        'You have reached the maximum number of stores.',
                    );
                }
            }
        ];
    }
}
