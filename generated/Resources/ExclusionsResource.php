<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Exclusions\IExclusion;
use spkm\IsamsApi\Requests\Exclusions\GetExclusionCancellationReasonsRequest;
use spkm\IsamsApi\Requests\Exclusions\GetExclusionsRequest;

class ExclusionsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Exclusions\IExclusion>
     * @see \spkm\IsamsApi\Requests\Exclusions\GetExclusionsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetExclusionsRequest(filter: $filter), IExclusion::class);
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Exclusions\ReasonForCancellation>
     * @see \spkm\IsamsApi\Requests\Exclusions\GetExclusionCancellationReasonsRequest
     */
    public function getCancellationReasons(): Collection
    {
        return $this->fetch(new GetExclusionCancellationReasonsRequest());
    }
}
