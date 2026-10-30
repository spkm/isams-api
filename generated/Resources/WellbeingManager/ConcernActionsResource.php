<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ConcernAction;
use spkm\IsamsApi\Data\WellbeingManager\ConcernActionForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\CreateConcernActionRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\DeleteConcernActionRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\GetConcernActionRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\PatchConcernActionRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernActionsResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernActionForCreate|array<string, mixed>  $concernAction
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\CreateConcernActionRequest
     */
    public function create(string $schoolId, int $concernId, ConcernActionForCreate|array $concernAction): Created
    {
        return $this->fetch(new CreateConcernActionRequest(schoolId: $schoolId, concernId: $concernId, concernAction: $concernAction));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\DeleteConcernActionRequest
     */
    public function delete(string $schoolId, int $concernId, int $id): void
    {
        $this->fetch(new DeleteConcernActionRequest(schoolId: $schoolId, concernId: $concernId, id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\GetConcernActionRequest
     */
    public function get(string $schoolId, int $concernId, int $id): ConcernAction
    {
        return $this->fetch(new GetConcernActionRequest(schoolId: $schoolId, concernId: $concernId, id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\PatchConcernActionRequest
     */
    public function patch(string $schoolId, int $concernId, int $id, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchConcernActionRequest(schoolId: $schoolId, concernId: $concernId, id: $id, patch: $patch));
    }
}
