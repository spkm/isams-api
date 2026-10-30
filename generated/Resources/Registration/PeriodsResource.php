<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Registration\RegistrationPeriod;
use spkm\IsamsApi\Requests\Registration\Periods\GetRegistrationPeriodRequest;
use spkm\IsamsApi\Requests\Registration\Periods\GetRegistrationPeriodsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PeriodsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Registration\RegistrationPeriod>
     * @see \spkm\IsamsApi\Requests\Registration\Periods\GetRegistrationPeriodsRequest
     */
    public function all(
        DateTimeInterface|string|null $endDate = null,
        DateTimeInterface|string|null $startDate = null,
        ?int $divisionId = null,
        ?string $userCode = null,
    ): Collection {
        return $this->fetch(new GetRegistrationPeriodsRequest(endDate: $endDate, startDate: $startDate, divisionId: $divisionId, userCode: $userCode));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Registration\Periods\GetRegistrationPeriodRequest
     */
    public function get(int $id): RegistrationPeriod
    {
        return $this->fetch(new GetRegistrationPeriodRequest(id: $id));
    }
}
