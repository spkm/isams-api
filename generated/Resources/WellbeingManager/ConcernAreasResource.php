<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\PastoralConcernArea;
use spkm\IsamsApi\Data\WellbeingManager\PastoralConcernAreaForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\CreateConcernAreaRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\DeleteConcernAreaRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\GetConcernAreaRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\GetConcernAreasRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\PatchConcernAreaRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernAreasResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\PastoralConcernArea>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\GetConcernAreasRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetConcernAreasRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\PastoralConcernAreaForCreate|array<string, mixed>  $pastoralConcernArea
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\CreateConcernAreaRequest
     */
    public function create(PastoralConcernAreaForCreate|array $pastoralConcernArea): Created
    {
        return $this->fetch(new CreateConcernAreaRequest(pastoralConcernArea: $pastoralConcernArea));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\DeleteConcernAreaRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteConcernAreaRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\GetConcernAreaRequest
     */
    public function get(int $id): PastoralConcernArea
    {
        return $this->fetch(new GetConcernAreaRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\PatchConcernAreaRequest
     */
    public function patch(int $id, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchConcernAreaRequest(id: $id, patch: $patch));

        return true;
    }
}
