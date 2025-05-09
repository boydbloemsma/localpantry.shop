<?php

namespace App\Actions;

use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateStoreAction
{
    public function handle(Store $store, array $attributes): void
    {
        DB::transaction(function () use ($store, $attributes) {
            $store->update([
                'name' => $attributes['name'],
                'slug' => Str::slug($attributes['name']),
                'description' => $attributes['description'],
            ]);
        });

        // todo
        // broadcast(new StoreUpdated($store))->toOthers();
    }
}

