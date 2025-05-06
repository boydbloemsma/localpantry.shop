<?php

namespace App\Models;

use Akaunting\Money\Money;
use App\Casts\MoneyCast;
use App\Http\Integrations\Cloudflare\CloudflareConnector;
use App\Http\Integrations\Cloudflare\Requests\DeleteImageRequest;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Product extends Model
{
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

    protected function isNew(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes): string {
                return Carbon::parse($attributes['created_at'])->gt(now()->subDays(7));
            }
        );
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes): string {
                return Money::EUR($attributes['price']);
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

    protected static function booted(): void
    {
        static::deleted(function (Product $product): void {
            if (!$product->image_id) {
                return;
            }

            $cloudflare = new CloudflareConnector();
            $cloudflare->send(new DeleteImageRequest($product->image_id));
        });
    }
}
