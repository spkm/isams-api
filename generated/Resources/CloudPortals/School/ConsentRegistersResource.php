<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\GetConsentRegistersRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\PatchContactConsentRegisterResponsesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\ConsentRegisters\PatchStudentConsentRegisterResponsesRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConsentRegistersResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetConsentRegistersRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchContactResponses(JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchContactConsentRegisterResponsesRequest($patch));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchResponses(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentConsentRegisterResponsesRequest($schoolId, $patch));
    }
}
