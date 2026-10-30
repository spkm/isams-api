<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\WellbeingManager\GirfecAreas\GetGirfecAreasRequest;

class GirfecAreasResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetGirfecAreasRequest());
    }
}
