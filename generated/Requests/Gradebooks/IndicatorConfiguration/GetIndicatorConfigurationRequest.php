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
 * Retrieve an indicator.
 *
 * GET /api/gradebooks/configuration/indicators/{indicatorId}
 */
#[Beta]
class GetIndicatorConfigurationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Indicator::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $indicatorId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/indicators/'.rawurlencode((string) $this->indicatorId);
    }
}
