<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActionStatuses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ActionStatus;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Concern Action Status.
 *
 * GET /api/wellbeing/concernactionstatuses/{id}
 */
class GetConcernActionStatusRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ActionStatus::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernactionstatuses/'.rawurlencode((string) $this->id);
    }
}
