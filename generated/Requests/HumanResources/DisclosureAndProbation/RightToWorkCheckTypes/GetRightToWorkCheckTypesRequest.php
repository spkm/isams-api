<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RightToWorkCheckTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\RightToWorkCheckType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all right to work check types.
 *
 * GET /api/humanresources/disclosureandprobation/righttoworkchecktypes
 */
class GetRightToWorkCheckTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = RightToWorkCheckType::class;
    public string $resultKey = 'rightToWorkCheckTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/disclosureandprobation/righttoworkchecktypes';
    }
}
