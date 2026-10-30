<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Photos;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student's current photo.
 *
 * GET /api/students/{schoolId}/photos/current
 */
class GetCurrentStudentPhotoRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/photos/current';
    }
}
