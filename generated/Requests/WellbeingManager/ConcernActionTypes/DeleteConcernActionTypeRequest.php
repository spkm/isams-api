<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes a concern action type.
 *
 * DELETE /api/wellbeing/concernactiontypes/{id}
 */
class DeleteConcernActionTypeRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernactiontypes/'.rawurlencode((string) $this->id);
    }
}
