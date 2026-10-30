<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernTypeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\CreateConcernTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\DeleteConcernTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\GetConcernTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\GetConcernTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\PatchConcernTypeRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernTypesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetConcernTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernTypeForCreate|array<string, mixed>  $concernType
     */
    public function create(ConcernTypeForCreate|array $concernType): Response
    {
        return $this->connector->send(new CreateConcernTypeRequest($concernType));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteConcernTypeRequest($id));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetConcernTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernTypeRequest($id, $patch));
    }
}
