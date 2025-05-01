<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateProductAction
{
    public function handle(
        array $attributes,
        UploadedFile $image,
        Store $store,
    ): void
    {
        $path = $image->store('products', 'public');

        DB::transaction(function () use ($attributes, $path, $store) {
            Product::create([
                'store_id' => $store->id,
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

