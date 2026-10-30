<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\AgencyForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\Agency\CreateAgencyRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Agency\DeleteAgencyRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Agency\GetAgenciesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Agency\GetAgencyRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Agency\PatchAgencyRequest;
use spkm\IsamsApi\Support\JsonPatch;

class AgencyResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\AgencyForCreate|array<string, mixed>  $agency
     */
    public function createAgency(AgencyForCreate|array $agency): Response
    {
        return $this->connector->send(new CreateAgencyRequest($agency));
    }

    public function deleteAgency(int $id): Response
    {
        return $this->connector->send(new DeleteAgencyRequest($id));
    }

    public function getAgencies(): Response
    {
        return $this->connector->send(new GetAgenciesRequest());
    }

    public function getAgency(int $id): Response
    {
        return $this->connector->send(new GetAgencyRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchAgency(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchAgencyRequest($id, $patch));
    }
}
