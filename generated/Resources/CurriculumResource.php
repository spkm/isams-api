<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Resources\Curriculum\CyclesResource;

class CurriculumResource extends BaseResource
{
    public function cycles(): CyclesResource
    {
        return new CyclesResource($this->connector);
    }
}
