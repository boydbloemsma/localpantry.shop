<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    public $fillable = [
        'store_id',
        'name',
        'description',
        'price',
        'image_id',
    ];

    protected $casts = [
        'price' => MoneyCast::class,
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes): string {
                return sprintf(
                    'https://imagedelivery.net/%s/%s/public',
                    config('services.cloudflare.account_hash'),
                    $attributes['image_id'],
                );
            }
        );
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $store = request()->route('store');

        return $this->where('slug', $value)
            ->where('store_id', $store->id)
            ->firstOrFail();
    }
}
