<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Configuration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\Configuration;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the configuration settings for Wellbeing Manager.
 *
 * GET /api/wellbeing/configuration
 */
class GetWellbeingConfigurationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Configuration::class;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/configuration';
    }
}
