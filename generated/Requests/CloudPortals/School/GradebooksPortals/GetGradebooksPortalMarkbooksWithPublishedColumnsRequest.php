<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get Markbooks with Published Columns for a Student.
 *
 * GET /api/portals/markbooks/students/{schoolId}
 */
class GetGradebooksPortalMarkbooksWithPublishedColumnsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/markbooks/students/'.rawurlencode((string) $this->schoolId);
    }
}
