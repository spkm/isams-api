<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Registration\UpdateRegistrationStatusCommand;
use spkm\IsamsApi\Requests\Registration\StatusStudents\GetStudentRegistrationStatusRequest;
use spkm\IsamsApi\Requests\Registration\StatusStudents\UpdateStudentRegistrationStatusRequest;

class StatusStudentsResource extends BaseResource
{
    public function getStudentRegistrationStatus(int $registrationPeriodId, string $schoolId): Response
    {
        return $this->connector->send(new GetStudentRegistrationStatusRequest($registrationPeriodId, $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Registration\UpdateRegistrationStatusCommand|array<string, mixed>  $updateRegistrationStatus
     */
    public function updateStudentRegistrationStatus(
        int $registrationPeriodId,
        string $schoolId,
        UpdateRegistrationStatusCommand|array $updateRegistrationStatus,
    ): Response {
        return $this->connector->send(new UpdateStudentRegistrationStatusRequest($registrationPeriodId, $schoolId, $updateRegistrationStatus));
    }
}
