<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\YearGroupDivisions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\YearGroupDivision;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all divisions associated with a year group.
 *
 * GET /api/school/yeargroups/{id}/divisions
 */
class GetYearGroupDivisionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = YearGroupDivision::class;
    public string $resultKey = 'divisions';
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/yeargroups/'.rawurlencode((string) $this->id).'/divisions';
    }
}
