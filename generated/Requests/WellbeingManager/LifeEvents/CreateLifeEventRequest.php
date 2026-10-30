<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\LifeEvents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\LifeEventForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a life event.
 *
 * POST /api/wellbeing/students/{schoolId}/lifeevents
 */
class CreateLifeEventRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\LifeEventForCreate|array<string, mixed>  $lifeEvent
     */
    public function __construct(
        protected string $schoolId,
        protected LifeEventForCreate|array $lifeEvent,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/lifeevents';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->lifeEvent instanceof Data ? $this->lifeEvent->toArray() : $this->lifeEvent;
    }
}
