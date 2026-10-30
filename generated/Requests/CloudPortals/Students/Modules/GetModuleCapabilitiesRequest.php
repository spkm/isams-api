<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Students\Modules;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Framework\PortalModuleCapabilities;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/modules/capabilities
 */
class GetModuleCapabilitiesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PortalModuleCapabilities::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/modules/capabilities';
    }
}
