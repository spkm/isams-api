<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Students;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\PrivateStudentDetailed;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}
 */
class GetPortalStudentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PrivateStudentDetailed::class;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId);
    }
}
