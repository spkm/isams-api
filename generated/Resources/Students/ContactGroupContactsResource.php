<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\Students\ContactGroupContacts\GetContactGroupContactsRequest;

class ContactGroupContactsResource extends BaseResource
{
    public function all(
        int $contactGroupId,
        ?bool $includeDeceased = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetContactGroupContactsRequest($contactGroupId, $includeDeceased, $filter));
    }
}
