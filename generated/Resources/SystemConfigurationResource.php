<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListGroupResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListResource;
use spkm\IsamsApi\Resources\SystemConfiguration\SmsResource;
use spkm\IsamsApi\Resources\SystemConfiguration\TagsResource;

class SystemConfigurationResource extends BaseResource
{
    public function list(): ListResource
    {
        return new ListResource($this->connector);
    }

    public function listGroup(): ListGroupResource
    {
        return new ListGroupResource($this->connector);
    }

    public function sms(): SmsResource
    {
        return new SmsResource($this->connector);
    }

    public function tags(): TagsResource
    {
        return new TagsResource($this->connector);
    }
}
