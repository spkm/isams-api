<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Registration\Status\GetRegistrationStatusesRequest;

class StatusResource extends BaseResource
{
    public function all(int $registrationPeriodId, ?int $page = null, ?int $pageSize = null): Response
    {
        return $this->connector->send(new GetRegistrationStatusesRequest($registrationPeriodId, $page, $pageSize));
    }
}
