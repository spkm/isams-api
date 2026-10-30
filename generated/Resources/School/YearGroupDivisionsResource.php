<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\School\YearGroupDivisions\GetYearGroupDivisionsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class YearGroupDivisionsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\YearGroupDivision>
     * @see \spkm\IsamsApi\Requests\School\YearGroupDivisions\GetYearGroupDivisionsRequest
     */
    public function all(int $id): Collection
    {
        return $this->fetch(new GetYearGroupDivisionsRequest(id: $id));
    }
}
