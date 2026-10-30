<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Activities;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\Activity;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/activities
 */
class GetActivitiesForStudentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Activity::class;
    public string $resultKey = 'activities';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/activities';
    }
}
