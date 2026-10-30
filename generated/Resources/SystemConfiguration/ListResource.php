<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\SystemConfiguration\List\GetListByTypeRequest;

class ListResource extends BaseResource
{
    public function getListByType(string $listType): Response
    {
        return $this->connector->send(new GetListByTypeRequest($listType));
    }
}
