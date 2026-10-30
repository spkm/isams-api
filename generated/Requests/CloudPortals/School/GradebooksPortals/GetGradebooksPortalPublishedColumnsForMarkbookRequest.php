<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\GradebooksPortals;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get a Students Markbooks Columns which have been Published.
 *
 * GET /api/portals/markbooks/{markbookId}/students/{schoolId}/columns
 */
class GetGradebooksPortalPublishedColumnsForMarkbookRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected string $schoolId,
        protected int $markbookId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/markbooks/'.rawurlencode((string) $this->markbookId).'/students/'.rawurlencode((string) $this->schoolId).'/columns';
    }
}
