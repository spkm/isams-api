<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Registration\UpdateStudentAttendanceSelfRegistrationRegisterCollectionForUpdate;
use spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\GetSelfRegistrationConfigRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\GetSelfRegistrationRegisterPeriodsByDateRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\UpdateSelfRegistrationRegisterPeriodsRequest;

class StudentsSelfRegistrationResource extends BaseResource
{
    public function getSelfRegistrationConfig(): Response
    {
        return $this->connector->send(new GetSelfRegistrationConfigRequest());
    }

    public function getSelfRegistrationRegisterPeriodsByDate(DateTimeInterface|string $date): Response
    {
        return $this->connector->send(new GetSelfRegistrationRegisterPeriodsByDateRequest($date));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Registration\UpdateStudentAttendanceSelfRegistrationRegisterCollectionForUpdate|array<string, mixed>  $updateStudentRegistersDto
     */
    public function updateSelfRegistrationRegisterPeriods(
        UpdateStudentAttendanceSelfRegistrationRegisterCollectionForUpdate|array $updateStudentRegistersDto,
    ): Response {
        return $this->connector->send(new UpdateSelfRegistrationRegisterPeriodsRequest($updateStudentRegistersDto));
    }
}
