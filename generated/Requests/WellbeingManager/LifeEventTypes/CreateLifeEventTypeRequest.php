<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\LifeEventTypeForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a Life Event Type.
 *
 * POST /api/wellbeing/lifeeventtypes
 */
class CreateLifeEventTypeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\LifeEventTypeForCreate|array<string, mixed>  $lifeEventType
     */
    public function __construct(
        protected LifeEventTypeForCreate|array $lifeEventType,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/lifeeventtypes';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->lifeEventType instanceof Data ? $this->lifeEventType->toArray() : $this->lifeEventType;
    }
}
