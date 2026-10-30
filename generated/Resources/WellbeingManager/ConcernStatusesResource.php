<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernStatusForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\CreateConcernStatusRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\DeleteConcernStatusRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\GetConcernStatusRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\GetConcernStatusesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses\PatchConcernStatusRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernStatusesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetConcernStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernStatusForCreate|array<string, mixed>  $concernStatus
     */
    public function create(ConcernStatusForCreate|array $concernStatus): Response
    {
        return $this->connector->send(new CreateConcernStatusRequest($concernStatus));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteConcernStatusRequest($id));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetConcernStatusRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernStatusRequest($id, $patch));
    }
}
