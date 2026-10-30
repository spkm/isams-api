<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\EntityTypes\GetTagEntityTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\Tags\EntityTypes\GetTagEntityTypesRequest;

class TagsEntityTypesResource extends BaseResource
{
    public function getTagEntityType(int $id): Response
    {
        return $this->connector->send(new GetTagEntityTypeRequest($id));
    }

    public function getTagEntityTypes(): Response
    {
        return $this->connector->send(new GetTagEntityTypesRequest());
    }
}
