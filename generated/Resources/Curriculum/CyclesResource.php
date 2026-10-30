<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Curriculum;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Curriculum\Cycles\GetCurriculumCyclesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CyclesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Curriculum\Cycle>
     * @see \spkm\IsamsApi\Requests\Curriculum\Cycles\GetCurriculumCyclesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetCurriculumCyclesRequest());
    }
}
