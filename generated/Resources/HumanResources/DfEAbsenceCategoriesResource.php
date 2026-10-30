<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\HumanResources\DfEAbsenceCategories\GetDfEAbsenceCategoriesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DfEAbsenceCategoriesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\AbsenceCategory>
     * @see \spkm\IsamsApi\Requests\HumanResources\DfEAbsenceCategories\GetDfEAbsenceCategoriesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetDfEAbsenceCategoriesRequest());
    }
}
