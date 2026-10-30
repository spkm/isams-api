<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Students\PortalContactUpdateRequestForCreate;
use spkm\IsamsApi\Requests\CloudPortals\School\Contacts\GetStudentContactsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Contacts\PatchStudentContactRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Contacts\SubmitContactUpdateRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ContactsResource extends BaseResource
{
    public function all(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentContactsRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, int $contactId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentContactRequest($schoolId, $contactId, $patch));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\PortalContactUpdateRequestForCreate|array<string, mixed>  $portalContactUpdateRequest
     */
    public function submitUpdate(PortalContactUpdateRequestForCreate|array $portalContactUpdateRequest): Response
    {
        return $this->connector->send(new SubmitContactUpdateRequest($portalContactUpdateRequest));
    }
}
