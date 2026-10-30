<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\HumanResources\SalaryPayScales\GetSalaryPayScalesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SalaryPayScalesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\SalaryPayScale>
     * @see \spkm\IsamsApi\Requests\HumanResources\SalaryPayScales\GetSalaryPayScalesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetSalaryPayScalesRequest());
    }
}
