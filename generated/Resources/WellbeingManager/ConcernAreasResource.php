<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\PastoralConcernAreaForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\CreateConcernAreaRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\DeleteConcernAreaRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\GetConcernAreaRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\GetConcernAreasRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernAreas\PatchConcernAreaRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernAreasResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetConcernAreasRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\PastoralConcernAreaForCreate|array<string, mixed>  $pastoralConcernArea
     */
    public function create(PastoralConcernAreaForCreate|array $pastoralConcernArea): Response
    {
        return $this->connector->send(new CreateConcernAreaRequest($pastoralConcernArea));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteConcernAreaRequest($id));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetConcernAreaRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernAreaRequest($id, $patch));
    }
}
