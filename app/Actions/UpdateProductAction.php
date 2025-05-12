<?php

namespace App\Actions;

use App\Http\Integrations\Cloudflare\CloudflareConnector;
use App\Http\Integrations\Cloudflare\Image;
use App\Http\Integrations\Cloudflare\Requests\DeleteImageRequest;
use App\Http\Integrations\Cloudflare\Requests\UploadImageRequest;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateProductAction
{
    public function handle(
        array $attributes,
        Product $product,
        ?UploadedFile $image_file,
    ): void
    {
        DB::transaction(function () use ($attributes, $product, $image_file) {
            $cloudflare = new CloudflareConnector();

            if ($image_file) {
                if ($product->image_id) {
                    $cloudflare->send(new DeleteImageRequest($product->image_id));
                }

                $response = $cloudflare->send(new UploadImageRequest($image_file));

                /** @var Image $image */
                $image = $response->dtoOrFail();

                $product->image_id = $image->id;
            }

            $product->update([
                'name' => $attributes['name'],
                'slug' => Str::slug($attributes['name']),
                'description' => $attributes['description'],
                'price' => $attributes['price'],
                'available' => !empty($attributes['available']),
            ]);
        });

        // todo
        // broadcast(new ProductCreated($product))->toOthers();
    }
}
