<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Students\ContactGroups\GetContactGroupsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ContactGroupsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ContactGroup>
     * @see \spkm\IsamsApi\Requests\Students\ContactGroups\GetContactGroupsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetContactGroupsRequest());
    }
}
