<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\IndicatorConfiguration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\Indicator;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all indicators.
 *
 * GET /api/gradebooks/configuration/indicators
 */
#[Beta]
class GetIndicatorConfigurationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Indicator::class;
    public string $resultKey = 'indicators';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/indicators';
    }
}
