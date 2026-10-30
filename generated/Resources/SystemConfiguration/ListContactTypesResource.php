<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\SystemConfiguration\List\ContactTypes\GetContactTypesRequest;

class ListContactTypesResource extends BaseResource
{
    public function getContactTypes(): Response
    {
        return $this->connector->send(new GetContactTypesRequest());
    }
}
