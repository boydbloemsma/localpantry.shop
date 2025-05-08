<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeleteProductAction
{
    public function handle(Product $product): void
    {
        DB::transaction(function () use ($product) {
            $product->delete();
        });

        // todo
        // broadcast(new ProductDeleted($product))->toOthers();
    }
}

