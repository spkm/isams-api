<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use DateTimeInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\CloudPortals\LeaveRequest;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\CancelLeaveRequestRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\SubmitLeaveRequestRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class LeaveRequestsResource extends IsamsResource
{
    /**
     * @param  array<mixed>|null  $status
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\CloudPortals\LeaveRequest>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestsRequest
     */
    public function all(
        string $schoolId,
        ?array $status = null,
        DateTimeInterface|string|null $startDate = null,
        DateTimeInterface|string|null $endDate = null,
    ): LazyCollection {
        return $this->each(new GetLeaveRequestsRequest(schoolId: $schoolId, status: $status, startDate: $startDate, endDate: $endDate), LeaveRequest::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\CancelLeaveRequestRequest
     */
    public function cancel(int $id, string $schoolId): Created
    {
        return $this->fetch(new CancelLeaveRequestRequest(id: $id, schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestRequest
     */
    public function get(string $schoolId, int $id): LeaveRequest
    {
        return $this->fetch(new GetLeaveRequestRequest(schoolId: $schoolId, id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestDocumentRequest
     */
    public function getDocument(string $schoolId, int $requestId, int $documentId): File
    {
        return $this->fetch(new GetLeaveRequestDocumentRequest(schoolId: $schoolId, requestId: $requestId, documentId: $documentId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\LeaveRequestType>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\GetLeaveRequestTypesRequest
     */
    public function getTypes(): Collection
    {
        return $this->fetch(new GetLeaveRequestTypesRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests\SubmitLeaveRequestRequest
     */
    public function submit(): Created
    {
        return $this->fetch(new SubmitLeaveRequestRequest());
    }
}
