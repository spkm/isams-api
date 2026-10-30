<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionStatuses\GetConcernActionStatusRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionStatuses\GetConcernActionStatusesRequest;

class ConcernActionStatusesResource extends BaseResource
{
    public function getConcernActionStatus(int $id): Response
    {
        return $this->connector->send(new GetConcernActionStatusRequest($id));
    }

    public function getConcernActionStatuses(): Response
    {
        return $this->connector->send(new GetConcernActionStatusesRequest());
    }
}
