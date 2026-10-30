<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\YearGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\YearGroup;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all year groups.
 *
 * GET /api/school/yeargroups
 */
class GetYearGroupsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = YearGroup::class;
    public string $resultKey = 'yearGroups';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/school/yeargroups';
    }
}
