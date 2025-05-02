<?php

namespace App\Actions;

use App\Http\Integrations\Cloudflare\CloudflareConnector;
use App\Http\Integrations\Cloudflare\Image;
use App\Http\Integrations\Cloudflare\Requests\UploadImageRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateProductAction
{
    public function handle(
        array $attributes,
        UploadedFile $image_file,
        Store $store,
    ): void
    {
        $cloudflare = new CloudflareConnector();
        $request = new UploadImageRequest($image_file);

        $response = $cloudflare->send($request);

        /** @var Image $image */
        $image = $response->dtoOrFail();

        DB::transaction(function () use ($attributes, $image, $store) {
            Product::create([
                'store_id' => $store->id,
                'name' => $attributes['name'],
                'slug' => Str::slug($attributes['name']),
                'description' => $attributes['description'],
                'price' => $attributes['price'],
                'image_id' => $image->id,
            ]);
        });

        // todo
        // broadcast(new ProductCreated($product))->toOthers();
    }
}

