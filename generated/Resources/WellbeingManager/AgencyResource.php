<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\Agency;
use spkm\IsamsApi\Data\WellbeingManager\AgencyForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\Agency\CreateAgencyRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Agency\DeleteAgencyRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Agency\GetAgenciesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Agency\GetAgencyRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Agency\PatchAgencyRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class AgencyResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\Agency>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Agency\GetAgenciesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetAgenciesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\AgencyForCreate|array<string, mixed>  $agency
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Agency\CreateAgencyRequest
     */
    public function create(AgencyForCreate|array $agency): Created
    {
        return $this->fetch(new CreateAgencyRequest(agency: $agency));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Agency\DeleteAgencyRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteAgencyRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Agency\GetAgencyRequest
     */
    public function get(int $id): Agency
    {
        return $this->fetch(new GetAgencyRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\Agency\PatchAgencyRequest
     */
    public function patch(int $id, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchAgencyRequest(id: $id, patch: $patch));
    }
}
