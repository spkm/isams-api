<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\LifeEventType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Life Event Type.
 *
 * GET /api/wellbeing/lifeeventtypes/{id}
 */
class GetLifeEventTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = LifeEventType::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/lifeeventtypes/'.rawurlencode((string) $this->id);
    }
}
