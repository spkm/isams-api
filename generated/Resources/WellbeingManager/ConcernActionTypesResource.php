<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernActionTypeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\CreateConcernActionTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\DeleteConcernActionTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\GetConcernActionTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\GetConcernActionTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\PatchConcernActionTypeRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernActionTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernActionTypeForCreate|array<string, mixed>  $concernActionType
     */
    public function createConcernActionType(ConcernActionTypeForCreate|array $concernActionType): Response
    {
        return $this->connector->send(new CreateConcernActionTypeRequest($concernActionType));
    }

    public function deleteConcernActionType(int $id): Response
    {
        return $this->connector->send(new DeleteConcernActionTypeRequest($id));
    }

    public function getConcernActionType(int $id): Response
    {
        return $this->connector->send(new GetConcernActionTypeRequest($id));
    }

    public function getConcernActionTypes(): Response
    {
        return $this->connector->send(new GetConcernActionTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchConcernActionType(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernActionTypeRequest($id, $patch));
    }
}
