<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\PortalsYearGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\YearGroup;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/school/yeargroups
 */
class GetPortalsYearGroupsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = YearGroup::class;
    public string $resultKey = 'yearGroups';

    public function resolveEndpoint(): string
    {
        return '/api/portals/school/yeargroups';
    }
}
