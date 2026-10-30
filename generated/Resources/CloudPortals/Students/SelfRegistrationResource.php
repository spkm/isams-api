<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Students;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Registration\SelfRegistrationRegistersForUpdate;
use spkm\IsamsApi\Data\Registration\StudentSelfRegistrationConfiguration;
use spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\GetSelfRegistrationConfigRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\GetSelfRegistrationRegisterPeriodsByDateRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\UpdateSelfRegistrationRegisterPeriodsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SelfRegistrationResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\GetSelfRegistrationConfigRequest
     */
    public function getConfig(): StudentSelfRegistrationConfiguration
    {
        return $this->fetch(new GetSelfRegistrationConfigRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Registration\StudentSelfRegistrationRegisterPeriod>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\GetSelfRegistrationRegisterPeriodsByDateRequest
     */
    public function getRegisterPeriodsByDate(DateTimeInterface|string $date): Collection
    {
        return $this->fetch(new GetSelfRegistrationRegisterPeriodsByDateRequest(date: $date));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Registration\SelfRegistrationRegistersForUpdate|array<string, mixed>  $selfRegistrationRegisters
     * @see \spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\UpdateSelfRegistrationRegisterPeriodsRequest
     */
    public function updateRegisterPeriods(SelfRegistrationRegistersForUpdate|array $selfRegistrationRegisters): bool
    {
        $this->fetch(new UpdateSelfRegistrationRegisterPeriodsRequest(selfRegistrationRegisters: $selfRegistrationRegisters));

        return true;
    }
}
