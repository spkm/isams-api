<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Admissions\Visit;
use spkm\IsamsApi\Requests\Admissions\Visits\GetAdmissionVisitsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class VisitsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Admissions\Visit>
     * @see \spkm\IsamsApi\Requests\Admissions\Visits\GetAdmissionVisitsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetAdmissionVisitsRequest(filter: $filter), Visit::class);
    }
}
