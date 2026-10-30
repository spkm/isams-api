<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Students\PortalContactUpdateRequestForCreate;
use spkm\IsamsApi\Requests\CloudPortals\School\Contacts\GetStudentContactsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Contacts\PatchStudentContactRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Contacts\SubmitContactUpdateRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ContactsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\PortalStudentContact>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Contacts\GetStudentContactsRequest
     */
    public function all(string $schoolId): Collection
    {
        return $this->fetch(new GetStudentContactsRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Contacts\PatchStudentContactRequest
     */
    public function patch(string $schoolId, int $contactId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentContactRequest(schoolId: $schoolId, contactId: $contactId, patch: $patch));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\PortalContactUpdateRequestForCreate|array<string, mixed>  $portalContactUpdateRequest
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Contacts\SubmitContactUpdateRequest
     */
    public function submitUpdate(PortalContactUpdateRequestForCreate|array $portalContactUpdateRequest): Created
    {
        return $this->fetch(new SubmitContactUpdateRequest(portalContactUpdateRequest: $portalContactUpdateRequest));
    }
}
