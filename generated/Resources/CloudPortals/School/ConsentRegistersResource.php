<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use spkm\IsamsApi\Data\DataProtection\PortalConsentRegisterResponses;
use spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\GetConsentRegistersRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\PatchContactConsentRegisterResponsesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\PatchStudentConsentRegisterResponsesRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConsentRegistersResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\GetConsentRegistersRequest
     */
    public function all(): ?PortalConsentRegisterResponses
    {
        return $this->fetch(new GetConsentRegistersRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\PatchContactConsentRegisterResponsesRequest
     */
    public function patchContactResponses(JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchContactConsentRegisterResponsesRequest(patch: $patch));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\PatchStudentConsentRegisterResponsesRequest
     */
    public function patchResponses(string $schoolId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchStudentConsentRegisterResponsesRequest(schoolId: $schoolId, patch: $patch));

        return true;
    }
}
