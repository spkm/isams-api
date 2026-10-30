<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\University;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all universities.
 *
 * GET /api/portals/list/universities
 */
class GetListUniversitiesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = University::class;
    public string $resultKey = 'universities';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/universities';
    }
}
