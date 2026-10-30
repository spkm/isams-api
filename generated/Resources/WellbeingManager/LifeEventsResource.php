<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\LifeEvent;
use spkm\IsamsApi\Data\WellbeingManager\LifeEventForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\CreateLifeEventRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\DeleteLifeEventRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\GetLifeEventRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\PatchLifeEventRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class LifeEventsResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\LifeEventForCreate|array<string, mixed>  $lifeEvent
     * @see \spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\CreateLifeEventRequest
     */
    public function create(string $schoolId, LifeEventForCreate|array $lifeEvent): Created
    {
        return $this->fetch(new CreateLifeEventRequest(schoolId: $schoolId, lifeEvent: $lifeEvent));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\DeleteLifeEventRequest
     */
    public function delete(string $schoolId, int $id): void
    {
        $this->fetch(new DeleteLifeEventRequest(schoolId: $schoolId, id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\GetLifeEventRequest
     */
    public function get(string $schoolId, int $id): LifeEvent
    {
        return $this->fetch(new GetLifeEventRequest(schoolId: $schoolId, id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\PatchLifeEventRequest
     */
    public function patch(string $schoolId, int $id, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchLifeEventRequest(schoolId: $schoolId, id: $id, patch: $patch));
    }
}
