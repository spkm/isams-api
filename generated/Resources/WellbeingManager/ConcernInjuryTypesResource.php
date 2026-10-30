<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ConcernInjuryType;
use spkm\IsamsApi\Data\WellbeingManager\ConcernInjuryTypeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\CreateConcernInjuryTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\DeleteConcernInjuryTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\GetConcernInjuryTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\GetConcernInjuryTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\PatchConcernInjuryTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernInjuryTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ConcernInjuryType>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\GetConcernInjuryTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetConcernInjuryTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernInjuryTypeForCreate|array<string, mixed>  $concernInjuryType
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\CreateConcernInjuryTypeRequest
     */
    public function create(ConcernInjuryTypeForCreate|array $concernInjuryType): Created
    {
        return $this->fetch(new CreateConcernInjuryTypeRequest(concernInjuryType: $concernInjuryType));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\DeleteConcernInjuryTypeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteConcernInjuryTypeRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\GetConcernInjuryTypeRequest
     */
    public function get(int $id): ConcernInjuryType
    {
        return $this->fetch(new GetConcernInjuryTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\PatchConcernInjuryTypeRequest
     */
    public function patch(int $id, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchConcernInjuryTypeRequest(id: $id, patch: $patch));

        return true;
    }
}
