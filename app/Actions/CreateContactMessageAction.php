<?php

namespace App\Actions;

use App\Models\ContactMessage;
use Illuminate\Support\Facades\DB;

class CreateContactMessageAction
{
    public function handle(array $attributes): void
    {
        DB::transaction(function () use ($attributes) {
            ContactMessage::create([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'message' => $attributes['message'],
                'ip_address' => $attributes['ip_address'],
            ]);
        });

        // todo
        // broadcast(new ContactMessageCreated($contact_message))->toOthers();
    }
}

