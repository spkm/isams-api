<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Registration\AbsenceCodes\GetAbsenceCodesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AbsenceCodesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Registration\AbsenceCode>
     * @see \spkm\IsamsApi\Requests\Registration\AbsenceCodes\GetAbsenceCodesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetAbsenceCodesRequest());
    }
}
