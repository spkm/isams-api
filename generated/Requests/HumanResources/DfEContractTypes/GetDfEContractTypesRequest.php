<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\DfEContractTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\ContractType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all contract types.
 *
 * GET /api/humanresources/contracttypes
 */
class GetDfEContractTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ContractType::class;
    public string $resultKey = 'contractTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/contracttypes';
    }
}
