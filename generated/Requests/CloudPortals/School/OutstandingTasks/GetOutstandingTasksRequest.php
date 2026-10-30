<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\OutstandingTasks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\OutstandingTaskSummary;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Outstanding Form Builder tasks for the authenticated portal user.
 *
 * GET /api/portals/outstandingtasks
 */
class GetOutstandingTasksRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = OutstandingTaskSummary::class;

    public function resolveEndpoint(): string
    {
        return '/api/portals/outstandingtasks';
    }
}
