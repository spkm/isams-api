<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\GetConsentRegistersRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\PatchContactConsentRegisterResponsesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\PatchStudentConsentRegisterResponsesRequest;
use spkm\IsamsApi\Support\JsonPatch;

class SchoolConsentRegistersResource extends BaseResource
{
    public function getConsentRegisters(): Response
    {
        return $this->connector->send(new GetConsentRegistersRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchContactConsentRegisterResponses(JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchContactConsentRegisterResponsesRequest($patch));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentConsentRegisterResponses(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentConsentRegisterResponsesRequest($schoolId, $patch));
    }
}
