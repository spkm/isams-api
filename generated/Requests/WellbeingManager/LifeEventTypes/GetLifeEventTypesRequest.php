<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\LifeEventType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all life event types.
 *
 * GET /api/wellbeing/lifeeventtypes
 */
class GetLifeEventTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = LifeEventType::class;
    public string $resultKey = 'lifeEventTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/lifeeventtypes';
    }
}
