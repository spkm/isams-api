<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\SystemConfiguration\List\ContactTypes\GetContactTypesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ContactTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\ContactType>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\ContactTypes\GetContactTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetContactTypesRequest());
    }
}
