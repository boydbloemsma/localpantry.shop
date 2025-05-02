<?php

namespace App\Http\Integrations\Cloudflare\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class DeleteImageRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $image_id,
    ) {}

    public function resolveEndpoint(): string
    {
        $account_id = config('services.cloudflare.account_id');

        return "/accounts/$account_id/images/v1/$this->image_id";
    }

    public function hasRequestFailed(Response $response): bool
    {
        return !$response->successful() || !empty($response->json('errors'));
    }
}
