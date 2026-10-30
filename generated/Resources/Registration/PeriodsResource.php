<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Registration\Periods\GetRegistrationPeriodRequest;
use spkm\IsamsApi\Requests\Registration\Periods\GetRegistrationPeriodsRequest;

class PeriodsResource extends BaseResource
{
    public function all(
        DateTimeInterface|string|null $endDate = null,
        DateTimeInterface|string|null $startDate = null,
        ?int $divisionId = null,
        ?string $userCode = null,
    ): Response {
        return $this->connector->send(new GetRegistrationPeriodsRequest($endDate, $startDate, $divisionId, $userCode));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetRegistrationPeriodRequest($id));
    }
}
