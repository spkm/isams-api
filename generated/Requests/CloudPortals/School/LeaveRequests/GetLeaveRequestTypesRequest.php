<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\LeaveRequestType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/leaverequests/types
 */
class GetLeaveRequestTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = LeaveRequestType::class;
    public string $resultKey = 'leaveRequestTypes';

    public function resolveEndpoint(): string
    {
        return '/api/portals/leaverequests/types';
    }
}
