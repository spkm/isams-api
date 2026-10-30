<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use spkm\IsamsApi\Data\Registration\RegistrationStatus;
use spkm\IsamsApi\Data\Registration\UpdateRegistrationStatusCommand;
use spkm\IsamsApi\Requests\Registration\StatusStudents\GetStudentRegistrationStatusRequest;
use spkm\IsamsApi\Requests\Registration\StatusStudents\UpdateStudentRegistrationStatusRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StatusStudentsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Registration\StatusStudents\GetStudentRegistrationStatusRequest
     */
    public function get(int $registrationPeriodId, string $schoolId): RegistrationStatus
    {
        return $this->fetch(new GetStudentRegistrationStatusRequest(registrationPeriodId: $registrationPeriodId, schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Registration\UpdateRegistrationStatusCommand|array<string, mixed>  $updateRegistrationStatus
     * @see \spkm\IsamsApi\Requests\Registration\StatusStudents\UpdateStudentRegistrationStatusRequest
     */
    public function update(
        int $registrationPeriodId,
        string $schoolId,
        UpdateRegistrationStatusCommand|array $updateRegistrationStatus,
    ): bool {
        $this->fetch(new UpdateStudentRegistrationStatusRequest(registrationPeriodId: $registrationPeriodId, schoolId: $schoolId, updateRegistrationStatus: $updateRegistrationStatus));

        return true;
    }
}
