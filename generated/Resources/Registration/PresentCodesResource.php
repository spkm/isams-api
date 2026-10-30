<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Registration;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Registration\PresentCodes\GetPresentCodesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PresentCodesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Registration\PresentCode>
     * @see \spkm\IsamsApi\Requests\Registration\PresentCodes\GetPresentCodesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetPresentCodesRequest());
    }
}
