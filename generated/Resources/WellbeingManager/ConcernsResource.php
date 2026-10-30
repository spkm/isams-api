<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\WellbeingManager\Concern;
use spkm\IsamsApi\Requests\WellbeingManager\Concerns\GetConcernsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ConcernsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\WellbeingManager\Concern>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Concerns\GetConcernsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetConcernsRequest(filter: $filter), Concern::class);
    }
}
