<?php

namespace App\Http\Integrations\Cloudflare;

readonly class Image
{
    public function __construct(
        public string $id,
        public string $filename,
        public string $uploaded,
    ) {}
}
