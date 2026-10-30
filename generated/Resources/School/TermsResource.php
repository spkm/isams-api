<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Requests\School\Terms\GetTermsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class TermsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\Term>
     * @see \spkm\IsamsApi\Requests\School\Terms\GetTermsRequest
     */
    public function all(string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetTermsRequest(filter: $filter));
    }
}
