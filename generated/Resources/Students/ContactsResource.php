<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Students\Contacts\GetContactsBySchoolidRequest;
use spkm\IsamsApi\Requests\Students\Contacts\GetContactsRequest;

class ContactsResource extends BaseResource
{
    public function getContacts(
        mixed $page = null,
        mixed $pageSize = null,
        mixed $expand = null,
        mixed $filter = null,
    ): Response {
        return $this->connector->send(new GetContactsRequest($page, $pageSize, $expand, $filter));
    }

    public function getContactsBySchoolid(
        string $schoolId,
        bool $includeDeceased = false,
        mixed $expand = null,
        mixed $filter = null,
    ): Response {
        return $this->connector->send(new GetContactsBySchoolidRequest($schoolId, $includeDeceased, $expand, $filter));
    }
}
