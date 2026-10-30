<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\School;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all schools.
 *
 * GET /api/portals/list/schools
 */
class GetListSchoolsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = School::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/schools';
    }
}
