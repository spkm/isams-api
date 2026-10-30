<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ConcernSeverity;
use spkm\IsamsApi\Data\WellbeingManager\ConcernSeverityForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\CreateConcernSeverityRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\DeleteConcernSeverityRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\GetConcernSeveritiesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\GetConcernSeverityRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\PatchConcernSeverityRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernSeveritiesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ConcernSeverity>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\GetConcernSeveritiesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetConcernSeveritiesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernSeverityForCreate|array<string, mixed>  $concernSeverity
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\CreateConcernSeverityRequest
     */
    public function create(ConcernSeverityForCreate|array $concernSeverity): Created
    {
        return $this->fetch(new CreateConcernSeverityRequest(concernSeverity: $concernSeverity));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\DeleteConcernSeverityRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteConcernSeverityRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\GetConcernSeverityRequest
     */
    public function get(int $id): ConcernSeverity
    {
        return $this->fetch(new GetConcernSeverityRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\PatchConcernSeverityRequest
     */
    public function patch(int $id, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchConcernSeverityRequest(id: $id, patch: $patch));

        return true;
    }
}
