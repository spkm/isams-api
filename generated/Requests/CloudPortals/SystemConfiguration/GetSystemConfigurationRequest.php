<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\PortalSystemConfiguration;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/systemconfiguration
 */
class GetSystemConfigurationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PortalSystemConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/systemconfiguration';
    }
}
