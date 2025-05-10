<?php

namespace App\Http\Requests;

use App\Models\Store;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
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

                if ($this->user()->stores()->count() >= 1) {
                    $validator->errors()->add(
                        'name',
                        __('You have reached the maximum number of stores.'),
                    );

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
                    $validator->errors()->add('name', __('This name is not allowed.'));
                }

                if (Store::where('slug', $slug)->exists()) {
                    $validator->errors()->add(
                        'name',
                        __('A store with this name (or similar) already exists.'),
                    );
                }
            }
        ];
    }
}
