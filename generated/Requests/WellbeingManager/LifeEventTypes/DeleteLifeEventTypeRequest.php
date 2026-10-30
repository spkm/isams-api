<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes a Life Event Type.
 *
 * DELETE /api/wellbeing/lifeeventtypes/{id}
 */
class DeleteLifeEventTypeRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/lifeeventtypes/'.rawurlencode((string) $this->id);
    }
}
