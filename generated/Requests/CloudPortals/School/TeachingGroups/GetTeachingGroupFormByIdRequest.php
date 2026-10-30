<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\TeachingGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\TeachingGroupForm;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/teachinggroups/forms/{id}
 */
class GetTeachingGroupFormByIdRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = TeachingGroupForm::class;

    public function __construct(
        protected string $schoolId,
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/teachinggroups/forms/'.rawurlencode((string) $this->id);
    }
}
