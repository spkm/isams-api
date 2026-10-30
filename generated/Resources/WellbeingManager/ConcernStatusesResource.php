<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ConcernStatus;
use spkm\IsamsApi\Data\WellbeingManager\ConcernStatusForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\CreateConcernStatusRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\DeleteConcernStatusRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\GetConcernStatusRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\GetConcernStatusesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\PatchConcernStatusRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernStatusesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ConcernStatus>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\GetConcernStatusesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetConcernStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernStatusForCreate|array<string, mixed>  $concernStatus
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\CreateConcernStatusRequest
     */
    public function create(ConcernStatusForCreate|array $concernStatus): Created
    {
        return $this->fetch(new CreateConcernStatusRequest(concernStatus: $concernStatus));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\DeleteConcernStatusRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteConcernStatusRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\GetConcernStatusRequest
     */
    public function get(int $id): ConcernStatus
    {
        return $this->fetch(new GetConcernStatusRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\PatchConcernStatusRequest
     */
    public function patch(int $id, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchConcernStatusRequest(id: $id, patch: $patch));
    }
}
