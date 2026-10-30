<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\Registration\RegistrationStatus;
use spkm\IsamsApi\Requests\Registration\Status\GetRegistrationStatusesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StatusResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Registration\RegistrationStatus>
     * @see \spkm\IsamsApi\Requests\Registration\Status\GetRegistrationStatusesRequest
     */
    public function all(int $registrationPeriodId): LazyCollection
    {
        return $this->each(new GetRegistrationStatusesRequest(registrationPeriodId: $registrationPeriodId), RegistrationStatus::class);
    }
}
