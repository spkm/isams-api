<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernStatus;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Concern Status.
 *
 * GET /api/wellbeing/concernstatuses/{id}
 */
class GetConcernStatusRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ConcernStatus::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernstatuses/'.rawurlencode((string) $this->id);
    }
}
