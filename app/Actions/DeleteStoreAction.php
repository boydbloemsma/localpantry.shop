<?php

namespace App\Actions;

use App\Models\Store;
use Illuminate\Support\Facades\DB;

class DeleteStoreAction
{
    public function handle(Store $store): void
    {
        DB::transaction(function () use ($store) {
            $store->products()->delete();

            $store->delete();
        });

        // todo
        // broadcast(new StoreDeleted($store))->toOthers();
    }
}

