<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Forms\GetFormsRequest;

class FormsResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetFormsRequest());
    }
}
