<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    public $fillable = [
        'store_id',
        'name',
        'description',
        'price',
        'image_path',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
