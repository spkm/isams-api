<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\StudentRegisters\DateRangeForCreate;
use spkm\IsamsApi\Data\StudentRegisters\DateRangeForUpdate;
use spkm\IsamsApi\Data\StudentRegisters\StudentDateRanges;
use spkm\IsamsApi\Requests\StudentRegisters\DateRanges\CreateDateRangeRequest;
use spkm\IsamsApi\Requests\StudentRegisters\DateRanges\DeleteDateRangeRequest;
use spkm\IsamsApi\Requests\StudentRegisters\DateRanges\GetDateRangesRequest;
use spkm\IsamsApi\Requests\StudentRegisters\DateRanges\GetStudentDateRangesRequest;
use spkm\IsamsApi\Requests\StudentRegisters\DateRanges\UpdateDateRangeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DateRangesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\StudentRegisters\StudentDateRanges>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\DateRanges\GetDateRangesRequest
     */
    public function all(int $registerId, ?string $systemStatus = null): LazyCollection
    {
        return $this->each(new GetDateRangesRequest(registerId: $registerId, systemStatus: $systemStatus), StudentDateRanges::class);
    }

    /**
     * @param  \spkm\IsamsApi\Data\StudentRegisters\DateRangeForCreate|array<string, mixed>  $dateRange
     * @see \spkm\IsamsApi\Requests\StudentRegisters\DateRanges\CreateDateRangeRequest
     */
    public function create(int $registerId, string $schoolId, DateRangeForCreate|array $dateRange): Created
    {
        return $this->fetch(new CreateDateRangeRequest(registerId: $registerId, schoolId: $schoolId, dateRange: $dateRange));
    }

    /**
     * @see \spkm\IsamsApi\Requests\StudentRegisters\DateRanges\DeleteDateRangeRequest
     */
    public function delete(int $registerId, string $schoolId, int $dateRangeId): void
    {
        $this->fetch(new DeleteDateRangeRequest(registerId: $registerId, schoolId: $schoolId, dateRangeId: $dateRangeId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\StudentRegisters\DateRange>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\DateRanges\GetStudentDateRangesRequest
     */
    public function forStudent(int $registerId, string $schoolId): Collection
    {
        return $this->fetch(new GetStudentDateRangesRequest(registerId: $registerId, schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\StudentRegisters\DateRangeForUpdate|array<string, mixed>  $dateRange
     * @see \spkm\IsamsApi\Requests\StudentRegisters\DateRanges\UpdateDateRangeRequest
     */
    public function update(
        int $registerId,
        string $schoolId,
        int $dateRangeId,
        DateRangeForUpdate|array $dateRange,
    ): void {
        $this->fetch(new UpdateDateRangeRequest(registerId: $registerId, schoolId: $schoolId, dateRangeId: $dateRangeId, dateRange: $dateRange));
    }
}
