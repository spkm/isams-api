<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\SchoolAddresses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\SchoolAddress;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/school/addresses
 */
class GetSchoolAddressListRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = SchoolAddress::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/school/addresses';
    }
}
