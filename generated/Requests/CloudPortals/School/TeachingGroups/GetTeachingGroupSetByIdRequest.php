<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\TeachingGroupSet;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/teachinggroups/sets/{id}
 */
class GetTeachingGroupSetByIdRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = TeachingGroupSet::class;

    public function __construct(
        protected string $schoolId,
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/teachinggroups/sets/'.rawurlencode((string) $this->id);
    }
}
