<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Requests\Students\ContactGroupContacts\GetContactGroupContactsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ContactGroupContactsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ContactGroupContact>
     * @see \spkm\IsamsApi\Requests\Students\ContactGroupContacts\GetContactGroupContactsRequest
     */
    public function all(
        int $contactGroupId,
        ?bool $includeDeceased = null,
        string|Stringable|null $filter = null,
    ): Collection {
        return $this->fetch(new GetContactGroupContactsRequest(contactGroupId: $contactGroupId, includeDeceased: $includeDeceased, filter: $filter));
    }
}
