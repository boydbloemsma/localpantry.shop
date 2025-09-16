<?php

namespace App\Http\Integrations\Cloudflare\Requests;

use App\Http\Integrations\Cloudflare\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasMultipartBody;

class UploadImageRequest extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function __construct(protected UploadedFile $file) {}

    public function resolveEndpoint(): string
    {
        $account_id = config("services.cloudflare.account_id");

        return "/accounts/$account_id/images/v1";
    }

    protected function defaultBody(): array
    {
        return [
            new MultipartValue(
                name: "file",
                value: file_get_contents($this->file->getRealPath()),
                filename: Str::uuid() .
                    "." .
                    $this->file->getClientOriginalExtension(),
            ),
        ];
    }

    public function createDtoFromResponse(Response $response): Image
    {
        $data = $response->json();

        return new Image(
            id: $data["result"]["id"],
            filename: $data["result"]["filename"],
            uploaded: $data["result"]["uploaded"],
        );
    }

    public function hasRequestFailed(Response $response): bool
    {
        return !$response->successful() || !empty($response->json("errors"));
    }
}
