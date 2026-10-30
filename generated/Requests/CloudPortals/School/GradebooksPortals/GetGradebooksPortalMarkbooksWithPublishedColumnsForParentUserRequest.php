<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get Markbooks with Published Columns for a Student And Parent User.
 *
 * GET /api/portals/markbooks/students/{schoolId}/users/{viewedAsUserCode}
 */
class GetGradebooksPortalMarkbooksWithPublishedColumnsForParentUserRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected string $schoolId,
        protected string $viewedAsUserCode,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/markbooks/students/'.rawurlencode((string) $this->schoolId).'/users/'.rawurlencode((string) $this->viewedAsUserCode);
    }
}
