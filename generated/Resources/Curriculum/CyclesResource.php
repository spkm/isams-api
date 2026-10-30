<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Curriculum;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Curriculum\Cycles\GetCurriculumCyclesRequest;

class CyclesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetCurriculumCyclesRequest());
    }
}
