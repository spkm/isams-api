<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ConcernType;
use spkm\IsamsApi\Data\WellbeingManager\ConcernTypeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\CreateConcernTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\DeleteConcernTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\GetConcernTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\GetConcernTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\PatchConcernTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ConcernType>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\GetConcernTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetConcernTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernTypeForCreate|array<string, mixed>  $concernType
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\CreateConcernTypeRequest
     */
    public function create(ConcernTypeForCreate|array $concernType): Created
    {
        return $this->fetch(new CreateConcernTypeRequest(concernType: $concernType));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\DeleteConcernTypeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteConcernTypeRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\GetConcernTypeRequest
     */
    public function get(int $id): ConcernType
    {
        return $this->fetch(new GetConcernTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\PatchConcernTypeRequest
     */
    public function patch(int $id, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchConcernTypeRequest(id: $id, patch: $patch));

        return true;
    }
}
