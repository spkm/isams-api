<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ActionType;
use spkm\IsamsApi\Data\WellbeingManager\ConcernActionTypeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\CreateConcernActionTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\DeleteConcernActionTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\GetConcernActionTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\GetConcernActionTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\PatchConcernActionTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernActionTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ActionType>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\GetConcernActionTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetConcernActionTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernActionTypeForCreate|array<string, mixed>  $concernActionType
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\CreateConcernActionTypeRequest
     */
    public function create(ConcernActionTypeForCreate|array $concernActionType): Created
    {
        return $this->fetch(new CreateConcernActionTypeRequest(concernActionType: $concernActionType));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\DeleteConcernActionTypeRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteConcernActionTypeRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\GetConcernActionTypeRequest
     */
    public function get(int $id): ActionType
    {
        return $this->fetch(new GetConcernActionTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionTypes\PatchConcernActionTypeRequest
     */
    public function patch(int $id, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchConcernActionTypeRequest(id: $id, patch: $patch));
    }
}
