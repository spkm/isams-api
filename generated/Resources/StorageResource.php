<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Resources\Storage\FilesResource;

class StorageResource extends BaseResource
{
    public function files(): FilesResource
    {
        return new FilesResource($this->connector);
    }
}
