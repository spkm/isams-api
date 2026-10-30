<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Divisions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\Division;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/school/divisions
 */
class GetDivisionListRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Division::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/school/divisions';
    }
}
