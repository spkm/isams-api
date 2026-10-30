<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Registration\AttendanceCodeReasonForChangeForCreate;
use spkm\IsamsApi\Requests\Registration\ReasonForChange\CreateRegistrationReasonForChangeRequest;
use spkm\IsamsApi\Requests\Registration\ReasonForChange\DeleteRegistrationReasonForChangeRequest;
use spkm\IsamsApi\Requests\Registration\ReasonForChange\GetRegistrationReasonForChangesRequest;
use spkm\IsamsApi\Requests\Registration\ReasonForChange\PatchRegistrationReasonForChangeRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ReasonForChangeResource extends BaseResource
{
    public function all(
        DateTimeInterface|string|null $changeDateStart = null,
        DateTimeInterface|string|null $changeDateEnd = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?bool $onlyEmptyReasons = null,
        ?bool $oldestFirst = null,
    ): Response {
        return $this->connector->send(new GetRegistrationReasonForChangesRequest($changeDateStart, $changeDateEnd, $page, $pageSize, $onlyEmptyReasons, $oldestFirst));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Registration\AttendanceCodeReasonForChangeForCreate|array<string, mixed>  $attendanceCodeReasonForChange
     */
    public function create(
        int $periodId,
        string $schoolId,
        AttendanceCodeReasonForChangeForCreate|array $attendanceCodeReasonForChange,
    ): Response {
        return $this->connector->send(new CreateRegistrationReasonForChangeRequest($periodId, $schoolId, $attendanceCodeReasonForChange));
    }

    public function delete(int $periodId, string $schoolId, int $codeChangeId): Response
    {
        return $this->connector->send(new DeleteRegistrationReasonForChangeRequest($periodId, $schoolId, $codeChangeId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $periodId, string $schoolId, int $codeChangeId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchRegistrationReasonForChangeRequest($periodId, $schoolId, $codeChangeId, $patch));
    }
}
