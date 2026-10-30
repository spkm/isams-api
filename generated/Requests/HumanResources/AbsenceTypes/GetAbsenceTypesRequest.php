<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\AbsenceTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\AbsenceType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all absence types.
 *
 * GET /api/humanresources/absencetypes
 */
class GetAbsenceTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = AbsenceType::class;
    public string $resultKey = 'absenceTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/absencetypes';
    }
}
