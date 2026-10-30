<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StylingRuleConfiguration;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\StylingRule;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all styling rules.
 *
 * GET /api/gradebooks/configuration/stylingrules
 */
#[Beta]
class GetStylingRuleConfigurationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StylingRule::class;
    public string $resultKey = 'styleRules';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/stylingrules';
    }
}
