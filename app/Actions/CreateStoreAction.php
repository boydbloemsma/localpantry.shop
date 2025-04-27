<?php

namespace App\Actions;

use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateStoreAction
{
    public function handle(User $user, array $attributes): void
    {
        DB::transaction(function () use ($user, $attributes) {
            Store::create([
                'user_id' => $user->id,
                'name' => $attributes['name'],
                'slug' => Str::slug($attributes['name']),
                'description' => $attributes['description'],
            ]);
        });

        // todo
        // broadcast(new StoreCreated($store))->toOthers();
    }
}

