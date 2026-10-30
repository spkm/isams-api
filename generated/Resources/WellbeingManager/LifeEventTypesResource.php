<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\LifeEventType;
use spkm\IsamsApi\Data\WellbeingManager\LifeEventTypeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\CreateLifeEventTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\DeleteLifeEventTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\GetLifeEventTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\GetLifeEventTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\PatchLifeEventTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class LifeEventTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\LifeEventType>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\GetLifeEventTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetLifeEventTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\LifeEventTypeForCreate|array<string, mixed>  $lifeEventType
     * @see \spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\CreateLifeEventTypeRequest
     */
    public function create(LifeEventTypeForCreate|array $lifeEventType): Created
    {
        return $this->fetch(new CreateLifeEventTypeRequest(lifeEventType: $lifeEventType));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\DeleteLifeEventTypeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteLifeEventTypeRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\GetLifeEventTypeRequest
     */
    public function get(int $id): LifeEventType
    {
        return $this->fetch(new GetLifeEventTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\PatchLifeEventTypeRequest
     */
    public function patch(int $id, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchLifeEventTypeRequest(id: $id, patch: $patch));

        return true;
    }
}
