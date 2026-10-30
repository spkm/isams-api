<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\DataProtection\PortalConsentRegisterResponses;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/account/consentregisters
 */
class GetConsentRegistersRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PortalConsentRegisterResponses::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/account/consentregisters';
    }
}
