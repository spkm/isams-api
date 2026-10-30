<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get a Student And Parent Users Markbooks Columns which have been Published.
 *
 * GET /api/portals/markbooks/{markbookId}/students/{schoolId}/users/{viewedAsUserCode}/columns
 */
class GetGradebookPublishedColumnsForMarkbookForParentUserRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected int $markbookId,
        protected string $schoolId,
        protected string $viewedAsUserCode,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/markbooks/'.rawurlencode((string) $this->markbookId).'/students/'.rawurlencode((string) $this->schoolId).'/users/'.rawurlencode((string) $this->viewedAsUserCode).'/columns';
    }
}
