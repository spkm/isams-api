<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use spkm\IsamsApi\Resources\Discipline\DetentionSessionsResource;

class DisciplineResource extends IsamsResource
{
    public function detentionSessions(): DetentionSessionsResource
    {
        return new DetentionSessionsResource($this->connector);
    }
}
