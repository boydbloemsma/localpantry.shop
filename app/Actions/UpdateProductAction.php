<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateProductAction
{
    public function handle(
        array $attributes,
        Product $product,
        ?UploadedFile $image,
    ): void
    {
        DB::transaction(function () use ($attributes, $product, $image) {
            if ($image) {
                if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                    Storage::disk('public')->delete($product->image_path);
                }

                $path = $image->store('products', 'public');
                $product->image_path = $path;
            }

            $product->update([
                'name' => $attributes['name'],
                'slug' => Str::slug($attributes['name']),
                'description' => $attributes['description'],
                'price' => $attributes['price'],
            ]);
        });

        // todo
        // broadcast(new ProductCreated($product))->toOthers();
    }
}

