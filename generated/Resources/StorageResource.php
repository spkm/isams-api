<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use spkm\IsamsApi\Resources\Storage\FilesResource;

class StorageResource extends IsamsResource
{
    public function files(): FilesResource
    {
        return new FilesResource($this->connector);
    }
}
