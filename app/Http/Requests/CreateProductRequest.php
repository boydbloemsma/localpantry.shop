<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Validator;

class CreateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('create', [Product::class, $this->store]);
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
            'image' => ['image', 'mimes:jpeg,png,jpg' , 'max:5120'],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->any()) {
                    return;
                }

                if ($this->store->products()->count() >= 6) {
                    $validator->errors()->add(
                        'name',
                        __('You have reached the maximum number of products.'),
                    );
                }
            }
        ];
    }
}
