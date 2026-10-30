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
 * Retrieve a styling rule.
 *
 * GET /api/gradebooks/configuration/stylingrules/{stylingRuleId}
 */
#[Beta]
class GetStylingRuleConfigurationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = StylingRule::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $stylingRuleId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/configuration/stylingrules/'.rawurlencode((string) $this->stylingRuleId);
    }
}
