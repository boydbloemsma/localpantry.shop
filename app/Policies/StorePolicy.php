<?php

namespace App\Policies;

use App\Models\Store;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StorePolicy
{
    public function view(User $user, Store $store): bool
    {
        return $store->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Store $store): bool
    {
        return false;
    }

    public function delete(User $user, Store $store): bool
    {
        return false;
    }
}
