<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ActionType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Concern Action Type.
 *
 * GET /api/wellbeing/concernactiontypes/{id}
 */
class GetConcernActionTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ActionType::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernactiontypes/'.rawurlencode((string) $this->id);
    }
}
