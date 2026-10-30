<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/leaverequests/{schoolId}/{requestId}/documents/{documentId}
 */
class GetLeaveRequestDocumentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected string $schoolId,
        protected int $requestId,
        protected int $documentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/leaverequests/'.rawurlencode((string) $this->schoolId).'/'.rawurlencode((string) $this->requestId).'/documents/'.rawurlencode((string) $this->documentId);
    }
}
