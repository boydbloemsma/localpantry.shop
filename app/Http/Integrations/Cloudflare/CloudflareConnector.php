<?php

namespace App\Http\Integrations\Cloudflare;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Response;
use Saloon\Traits\Plugins\AcceptsJson;

class CloudflareConnector extends Connector
{
    use AcceptsJson;

    public function resolveBaseUrl(): string
    {
        return 'https://api.cloudflare.com/client/v4';
    }

    protected function defaultAuth(): Authenticator
    {
        return new TokenAuthenticator(config('services.cloudflare.token'));
    }
}
