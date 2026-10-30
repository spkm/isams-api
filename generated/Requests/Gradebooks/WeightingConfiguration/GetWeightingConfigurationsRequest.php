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
 * Retrieves all weighting configurations.
 *
 * GET /api/gradebooks/configuration/weightings
 */
#[Beta]
class GetWeightingConfigurationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Weighting::class;
    public string $resultKey = 'weightings';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/weightings';
    }
}
