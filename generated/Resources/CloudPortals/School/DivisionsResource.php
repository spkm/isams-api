<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\Divisions\GetDivisionListRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DivisionsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\Division>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Divisions\GetDivisionListRequest
     */
    public function getList(): Collection
    {
        return $this->fetch(new GetDivisionListRequest());
    }
}
