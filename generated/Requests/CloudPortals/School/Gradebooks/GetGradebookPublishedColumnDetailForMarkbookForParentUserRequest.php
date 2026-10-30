<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Gradebooks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get Published Column Detail for a Students And Parent Users Markbook.
 *
 * GET /api/portals/markbooks/{markbookId}/students/{schoolId}/users/{viewedAsUserCode}/columns/{columnId}/details
 */
class GetGradebookPublishedColumnDetailForMarkbookForParentUserRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected int $markbookId,
        protected string $schoolId,
        protected string $viewedAsUserCode,
        protected int $columnId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/markbooks/'.rawurlencode((string) $this->markbookId).'/students/'.rawurlencode((string) $this->schoolId).'/users/'.rawurlencode((string) $this->viewedAsUserCode).'/columns/'.rawurlencode((string) $this->columnId).'/details';
    }
}
