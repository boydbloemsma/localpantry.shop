<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    public function create(User $user, Store $store): bool
    {
        return $store->user_id === $user->id;
    }

    public function update(User $user, Product $product): bool
    {
        return $product->store->user_id === $user->id;
    }

    public function delete(User $user, Product $product): bool
    {
        return $product->store->user_id === $user->id;
    }
}
