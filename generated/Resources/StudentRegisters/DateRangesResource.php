<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\StudentRegisters\DateRangeForCreate;
use spkm\IsamsApi\Data\StudentRegisters\DateRangeForUpdate;
use spkm\IsamsApi\Requests\StudentRegisters\DateRanges\CreateDateRangeRequest;
use spkm\IsamsApi\Requests\StudentRegisters\DateRanges\DeleteDateRangeRequest;
use spkm\IsamsApi\Requests\StudentRegisters\DateRanges\GetDateRangesRequest;
use spkm\IsamsApi\Requests\StudentRegisters\DateRanges\GetStudentDateRangesRequest;
use spkm\IsamsApi\Requests\StudentRegisters\DateRanges\UpdateDateRangeRequest;

class DateRangesResource extends BaseResource
{
    public function all(
        int $registerId,
        ?string $systemStatus = null,
        ?int $page = null,
        ?int $pageSize = null,
    ): Response {
        return $this->connector->send(new GetDateRangesRequest($registerId, $systemStatus, $page, $pageSize));
    }

    /**
     * @param  \spkm\IsamsApi\Data\StudentRegisters\DateRangeForCreate|array<string, mixed>  $dateRange
     */
    public function create(int $registerId, string $schoolId, DateRangeForCreate|array $dateRange): Response
    {
        return $this->connector->send(new CreateDateRangeRequest($registerId, $schoolId, $dateRange));
    }

    public function delete(int $registerId, string $schoolId, int $dateRangeId): Response
    {
        return $this->connector->send(new DeleteDateRangeRequest($registerId, $schoolId, $dateRangeId));
    }

    public function forStudent(int $registerId, string $schoolId): Response
    {
        return $this->connector->send(new GetStudentDateRangesRequest($registerId, $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\StudentRegisters\DateRangeForUpdate|array<string, mixed>  $dateRange
     */
    public function update(
        int $registerId,
        string $schoolId,
        int $dateRangeId,
        DateRangeForUpdate|array $dateRange,
    ): Response {
        return $this->connector->send(new UpdateDateRangeRequest($registerId, $schoolId, $dateRangeId, $dateRange));
    }
}
