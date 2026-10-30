<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\LifeEvents;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\LifeEvent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a life event.
 *
 * GET /api/wellbeing/students/{schoolId}/lifeevents/{id}
 */
class GetLifeEventRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = LifeEvent::class;

    public function __construct(
        protected string $schoolId,
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/lifeevents/'.rawurlencode((string) $this->id);
    }
}
