<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CreateProductAction
{
    public function handle(User $user, array $attributes): void
    {
        DB::transaction(function () use ($user, $attributes) {
            Product::create([
                'store_id' => $user->store->id,
                'name' => $attributes['name'],
                'description' => $attributes['description'],
                'price' => $attributes['price'],
                'image_path' => $attributes['image_path'] ?? null,
            ]);
        });

        // todo
        // broadcast(new ProductCreated($product))->toOthers();
    }
}

