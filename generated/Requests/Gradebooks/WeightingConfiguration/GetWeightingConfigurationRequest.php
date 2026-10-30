<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\WeightingConfiguration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\Weighting;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve a weighting configurations.
 *
 * GET /api/gradebooks/configuration/weightings/{weightingId}
 */
#[Beta]
class GetWeightingConfigurationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Weighting::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $weightingId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/weightings/'.rawurlencode((string) $this->weightingId);
    }
}
