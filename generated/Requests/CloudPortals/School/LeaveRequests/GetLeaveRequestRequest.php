<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\LeaveRequest;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/leaverequests/{schoolId}/{id}
 */
class GetLeaveRequestRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = LeaveRequest::class;

    public function __construct(
        protected string $schoolId,
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/leaverequests/'.rawurlencode((string) $this->schoolId).'/'.rawurlencode((string) $this->id);
    }
}
