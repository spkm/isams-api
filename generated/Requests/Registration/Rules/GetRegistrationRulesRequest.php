<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\Rules;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Registration\RegistrationRule;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all registration rules.
 *
 * GET /api/registration/rules
 */
class GetRegistrationRulesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = RegistrationRule::class;
    public string $resultKey = 'registrationRules';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/registration/rules';
    }
}
