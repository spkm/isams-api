<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Students;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Registration\SelfRegistrationRegistersForUpdate;
use spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\GetSelfRegistrationConfigRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\GetSelfRegistrationRegisterPeriodsByDateRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\SelfRegistration\UpdateSelfRegistrationRegisterPeriodsRequest;

class SelfRegistrationResource extends BaseResource
{
    public function getConfig(): Response
    {
        return $this->connector->send(new GetSelfRegistrationConfigRequest());
    }

    public function getRegisterPeriodsByDate(DateTimeInterface|string $date): Response
    {
        return $this->connector->send(new GetSelfRegistrationRegisterPeriodsByDateRequest($date));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Registration\SelfRegistrationRegistersForUpdate|array<string, mixed>  $selfRegistrationRegisters
     */
    public function updateRegisterPeriods(
        SelfRegistrationRegistersForUpdate|array $selfRegistrationRegisters,
    ): Response {
        return $this->connector->send(new UpdateSelfRegistrationRegisterPeriodsRequest($selfRegistrationRegisters));
    }
}
