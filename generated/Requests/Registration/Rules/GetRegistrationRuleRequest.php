<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\Rules;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Registration\RegistrationRule;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a registration rule.
 *
 * GET /api/registration/rules/{id}
 */
class GetRegistrationRuleRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = RegistrationRule::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/rules/'.rawurlencode((string) $this->id);
    }
}
