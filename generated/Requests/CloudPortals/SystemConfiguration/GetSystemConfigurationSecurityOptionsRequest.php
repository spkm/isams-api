<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\SecurityOptions;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/systemconfiguration/security
 */
class GetSystemConfigurationSecurityOptionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = SecurityOptions::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/systemconfiguration/security';
    }
}
