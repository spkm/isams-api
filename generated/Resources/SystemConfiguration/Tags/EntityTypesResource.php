<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\Tags;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\EntityTypes\GetTagEntityTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\EntityTypes\GetTagEntityTypesRequest;

class EntityTypesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetTagEntityTypesRequest());
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetTagEntityTypeRequest($id));
    }
}
