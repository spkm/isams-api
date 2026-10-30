<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Concern Type.
 *
 * GET /api/wellbeing/concerntypes/{id}
 */
class GetConcernTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ConcernType::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concerntypes/'.rawurlencode((string) $this->id);
    }
}
