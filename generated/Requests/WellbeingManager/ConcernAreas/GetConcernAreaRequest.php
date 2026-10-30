<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\PastoralConcernArea;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Concern Area.
 *
 * GET /api/wellbeing/concernareas/{id}
 */
class GetConcernAreaRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PastoralConcernArea::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernareas/'.rawurlencode((string) $this->id);
    }
}
