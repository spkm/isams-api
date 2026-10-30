<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\DfEAbsenceCategories;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\AbsenceCategory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all absence categories.
 *
 * GET /api/humanresources/absencecategories
 */
class GetDfEAbsenceCategoriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = AbsenceCategory::class;
    public string $resultKey = 'absenceCategories';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/absencecategories';
    }
}
