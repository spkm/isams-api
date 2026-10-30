<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Teaching\Sets;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Associates a student with a set.
 *
 * POST /api/teaching/sets/{setId}/setList/{schoolId}
 */
class AddStudentToTeachingSetRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

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
