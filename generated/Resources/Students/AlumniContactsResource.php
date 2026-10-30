<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Students\AlumniContact;
use spkm\IsamsApi\Requests\Students\AlumniContacts\GetAlumniContactsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AlumniContactsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Students\AlumniContact>
     * @see \spkm\IsamsApi\Requests\Students\AlumniContacts\GetAlumniContactsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetAlumniContactsRequest(filter: $filter), AlumniContact::class);
    }
}
