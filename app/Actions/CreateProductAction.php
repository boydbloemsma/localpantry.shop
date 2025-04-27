<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateProductAction
{
    public function handle(User $user, array $attributes, UploadedFile $image): void
    {
        $path = $image->store('products', 'public');

        DB::transaction(function () use ($user, $attributes, $path) {
            Product::create([
                'store_id' => $user->store->id,
                'name' => $attributes['name'],
                'slug' => Str::slug($attributes['name']),
                'description' => $attributes['description'],
                'price' => $attributes['price'],
                'image_path' => $path,
            ]);
        });

        // todo
        // broadcast(new ProductCreated($product))->toOthers();
    }
}

