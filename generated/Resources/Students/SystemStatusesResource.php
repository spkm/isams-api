<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Students\SystemStatuses\GetStudentSystemStatusesRequest;

class SystemStatusesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetStudentSystemStatusesRequest());
    }
}
