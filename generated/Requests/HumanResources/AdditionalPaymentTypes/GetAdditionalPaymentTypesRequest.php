<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\AdditionalPaymentTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\HumanResources\AdditionalPaymentType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all additional payment types
 *
 * GET /api/humanresources/additionalpayments/types
 */
#[Beta]
class GetAdditionalPaymentTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = AdditionalPaymentType::class;
    public string $resultKey = 'additionalPaymentTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/additionalpayments/types';
    }
}
