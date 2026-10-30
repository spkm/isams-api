<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\School\Division;
use spkm\IsamsApi\Requests\School\Divisions\GetDivisionRequest;
use spkm\IsamsApi\Requests\School\Divisions\GetDivisionsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DivisionsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\Division>
     * @see \spkm\IsamsApi\Requests\School\Divisions\GetDivisionsRequest
     */
    public function all(string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetDivisionsRequest(filter: $filter));
    }

    /**
     * @see \spkm\IsamsApi\Requests\School\Divisions\GetDivisionRequest
     */
    public function get(string $code): Division
    {
        return $this->fetch(new GetDivisionRequest(code: $code));
    }
}
