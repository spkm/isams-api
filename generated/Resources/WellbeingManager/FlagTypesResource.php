<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\FlagTypeForCreate;
use spkm\IsamsApi\Data\WellbeingManager\PastoralFlagType;
use spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\CreateFlagTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\DeleteFlagTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\GetFlagTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\GetFlagTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\PatchFlagTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class FlagTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\PastoralFlagType>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\GetFlagTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetFlagTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\FlagTypeForCreate|array<string, mixed>  $flagType
     * @see \spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\CreateFlagTypeRequest
     */
    public function create(FlagTypeForCreate|array $flagType): Created
    {
        return $this->fetch(new CreateFlagTypeRequest(flagType: $flagType));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\DeleteFlagTypeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteFlagTypeRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\GetFlagTypeRequest
     */
    public function get(int $id): PastoralFlagType
    {
        return $this->fetch(new GetFlagTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\PatchFlagTypeRequest
     */
    public function patch(int $id, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchFlagTypeRequest(id: $id, patch: $patch));

        return true;
    }
}
