<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Address;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/address
 */
class GetAddressListByPostcodeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected ?string $postcode = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/address';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'postcode' => $this->postcode,
        ], fn (mixed $value) => $value !== null);
    }
}
