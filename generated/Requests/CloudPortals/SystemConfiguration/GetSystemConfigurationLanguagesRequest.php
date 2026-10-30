<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\Language;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/systemconfiguration/languages
 */
class GetSystemConfigurationLanguagesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Language::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/systemconfiguration/languages';
    }
}
