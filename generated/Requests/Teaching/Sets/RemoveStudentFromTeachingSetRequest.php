<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\Sets;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Dissociates a student from a set.
 *
 * DELETE /api/teaching/sets/{setId}/setList/{schoolId}
 */
class RemoveStudentFromTeachingSetRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $setId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/teaching/sets/'.rawurlencode((string) $this->setId).'/setList/'.rawurlencode((string) $this->schoolId);
    }
}
