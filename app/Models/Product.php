<?php

namespace App\Models;

use App\Casts\MoneyCast;
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

    protected $casts = [
        'price' => MoneyCast::class,
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function getimageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $store = request()->route('store');

        return $this->where('slug', $value)
            ->where('store_id', $store->id)
            ->firstOrFail();
    }
}
