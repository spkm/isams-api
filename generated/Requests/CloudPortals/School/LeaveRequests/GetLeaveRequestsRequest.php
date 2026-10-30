<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\LeaveRequests;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Data\CloudPortals\LeaveRequest;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/leaverequests/{schoolId}
 */
class GetLeaveRequestsRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = LeaveRequest::class;
    public string $resultKey = 'leaveRequests';

    /**
     * @param  array<mixed>|null  $status
     */
    public function __construct(
        protected string $schoolId,
        protected ?array $status = null,
        protected \DateTimeInterface|string|null $startDate = null,
        protected \DateTimeInterface|string|null $endDate = null,
        protected ?int $page = null,
        protected ?int $pageSize = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/leaverequests/'.rawurlencode((string) $this->schoolId);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'status' => $this->status,
            'startDate' => $this->startDate instanceof \DateTimeInterface ? $this->startDate->format('Y-m-d\TH:i:s') : $this->startDate,
            'endDate' => $this->endDate instanceof \DateTimeInterface ? $this->endDate->format('Y-m-d\TH:i:s') : $this->endDate,
            'page' => $this->page,
            'pageSize' => $this->pageSize,
        ], fn (mixed $value) => $value !== null);
    }
}
