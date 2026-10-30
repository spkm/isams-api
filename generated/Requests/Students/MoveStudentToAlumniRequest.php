<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Transitions a current student to former.
 *
 * POST /api/students/{schoolId}/commands/movetoalumni
 */
class MoveStudentToAlumniRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/commands/movetoalumni';
    }
}
