<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\OtherSchools;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\OtherSchools\Professions\GetProfessionsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ProfessionsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\OtherSchools\Profession>
     * @see \spkm\IsamsApi\Requests\OtherSchools\Professions\GetProfessionsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetProfessionsRequest());
    }
}
