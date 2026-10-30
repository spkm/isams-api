<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Activities;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\ActivityEvent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/activities/{activityId}/events
 */
class GetActivityEventsForStudentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ActivityEvent::class;
    public string $resultKey = 'activityEvents';

    public function __construct(
        protected string $schoolId,
        protected int $activityId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/activities/'.rawurlencode((string) $this->activityId).'/events';
    }
}
