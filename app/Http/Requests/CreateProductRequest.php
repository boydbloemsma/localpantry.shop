<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CreateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        // todo
        // return Gate::allows('create-product');
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
            'price' => ['required', 'numeric', 'min:1'],
            'image' => ['image', 'mimes:jpeg,png,jpg' , 'max:2048'],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->any()) {
                    return;
                }

                if ($this->store->products()->count() >= 5) {
                    $validator->errors()->add(
                        'name',
                        'You have reached the maximum number of products.',
                    );
                }
            }
        ];
    }
}
