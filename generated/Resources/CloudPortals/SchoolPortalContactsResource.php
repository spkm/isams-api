<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Students\PortalContactUpdateRequestForCreate;
use spkm\IsamsApi\Requests\CloudPortals\School\PortalContacts\GetPortalContactStudentContactsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PortalContacts\PatchPortalContactStudentContactRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PortalContacts\SubmitPortalContactUpdateRequestRequest;
use spkm\IsamsApi\Support\JsonPatch;

class SchoolPortalContactsResource extends BaseResource
{
    public function getPortalContactStudentContacts(string $schoolId): Response
    {
        return $this->connector->send(new GetPortalContactStudentContactsRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchPortalContactStudentContact(
        string $schoolId,
        int $contactId,
        JsonPatch|array $patch,
    ): Response {
        return $this->connector->send(new PatchPortalContactStudentContactRequest($schoolId, $contactId, $patch));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\PortalContactUpdateRequestForCreate|array<string, mixed>  $request
     */
    public function submitPortalContactUpdateRequest(PortalContactUpdateRequestForCreate|array $request): Response
    {
        return $this->connector->send(new SubmitPortalContactUpdateRequestRequest($request));
    }
}
