<?php

namespace App\Http\Requests;

use App\Models\Store;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class UpdateStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('update', $this->store);
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

                $slug = Str::slug($this->input('name'));

                if (
                    in_array($slug, [
                        'admin',
                        'api',
                        'auth',
                        'home',
                        'login',
                        'logout',
                        'register',
                        'www',
                        'mail',
                        'demo',
                    ])
                ) {
                    $validator->errors()->add('name', 'This name is not allowed.');
                }

                $slug_exists = Store::query()
                    ->where('slug', $slug)
                    ->where('id', '!=', $this->store->id)
                    ->exists();

                if ($slug_exists) {
                    $validator->errors()->add(
                        'name',
                        'A store with this name (or similar) already exists.',
                    );
                }
            }
        ];
    }
}
