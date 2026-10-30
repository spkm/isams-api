<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\CancelLeaveRequestRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\SubmitLeaveRequestRequest;

class SchoolLeaveRequestsResource extends BaseResource
{
    public function cancelLeaveRequest(int $id, string $schoolId): Response
    {
        return $this->connector->send(new CancelLeaveRequestRequest($id, $schoolId));
    }

    public function getLeaveRequest(string $schoolId, int $id): Response
    {
        return $this->connector->send(new GetLeaveRequestRequest($schoolId, $id));
    }

    public function getLeaveRequestDocument(string $schoolId, int $requestId, int $documentId): Response
    {
        return $this->connector->send(new GetLeaveRequestDocumentRequest($schoolId, $requestId, $documentId));
    }

    public function getLeaveRequestTypes(): Response
    {
        return $this->connector->send(new GetLeaveRequestTypesRequest());
    }

    /**
     * @param  array<mixed>|null  $status
     */
    public function getLeaveRequests(
        string $schoolId,
        ?array $status = null,
        DateTimeInterface|string|null $startDate = null,
        DateTimeInterface|string|null $endDate = null,
        ?int $page = null,
        ?int $pageSize = null,
    ): Response {
        return $this->connector->send(new GetLeaveRequestsRequest($schoolId, $status, $startDate, $endDate, $page, $pageSize));
    }

    public function submitLeaveRequest(): Response
    {
        return $this->connector->send(new SubmitLeaveRequestRequest());
    }
}
