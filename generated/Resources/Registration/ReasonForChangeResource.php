<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Registration\AttendanceCodeReasonForChange;
use spkm\IsamsApi\Data\Registration\AttendanceCodeReasonForChangeForCreate;
use spkm\IsamsApi\Requests\Registration\ReasonForChange\CreateRegistrationReasonForChangeRequest;
use spkm\IsamsApi\Requests\Registration\ReasonForChange\DeleteRegistrationReasonForChangeRequest;
use spkm\IsamsApi\Requests\Registration\ReasonForChange\GetRegistrationReasonForChangesRequest;
use spkm\IsamsApi\Requests\Registration\ReasonForChange\PatchRegistrationReasonForChangeRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ReasonForChangeResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Registration\AttendanceCodeReasonForChange>
     * @see \spkm\IsamsApi\Requests\Registration\ReasonForChange\GetRegistrationReasonForChangesRequest
     */
    public function all(
        DateTimeInterface|string|null $changeDateStart = null,
        DateTimeInterface|string|null $changeDateEnd = null,
        ?bool $onlyEmptyReasons = null,
        ?bool $oldestFirst = null,
    ): LazyCollection {
        return $this->each(new GetRegistrationReasonForChangesRequest(changeDateStart: $changeDateStart, changeDateEnd: $changeDateEnd, onlyEmptyReasons: $onlyEmptyReasons, oldestFirst: $oldestFirst), AttendanceCodeReasonForChange::class);
    }

    /**
     * @param  \spkm\IsamsApi\Data\Registration\AttendanceCodeReasonForChangeForCreate|array<string, mixed>  $attendanceCodeReasonForChange
     * @see \spkm\IsamsApi\Requests\Registration\ReasonForChange\CreateRegistrationReasonForChangeRequest
     */
    public function create(
        int $periodId,
        string $schoolId,
        AttendanceCodeReasonForChangeForCreate|array $attendanceCodeReasonForChange,
    ): Created {
        return $this->fetch(new CreateRegistrationReasonForChangeRequest(periodId: $periodId, schoolId: $schoolId, attendanceCodeReasonForChange: $attendanceCodeReasonForChange));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Registration\ReasonForChange\DeleteRegistrationReasonForChangeRequest
     */
    public function delete(int $periodId, string $schoolId, int $codeChangeId): void
    {
        $this->fetch(new DeleteRegistrationReasonForChangeRequest(periodId: $periodId, schoolId: $schoolId, codeChangeId: $codeChangeId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Registration\ReasonForChange\PatchRegistrationReasonForChangeRequest
     */
    public function patch(int $periodId, string $schoolId, int $codeChangeId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchRegistrationReasonForChangeRequest(periodId: $periodId, schoolId: $schoolId, codeChangeId: $codeChangeId, patch: $patch));
    }
}
