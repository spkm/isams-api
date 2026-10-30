<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Account;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\PortalProfileInformation;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/account/profile
 */
class GetAccountProfileInformationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PortalProfileInformation::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/profile';
    }
}
