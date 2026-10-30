<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\LifeEventTypeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\CreateLifeEventTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\DeleteLifeEventTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\GetLifeEventTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\GetLifeEventTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEventTypes\PatchLifeEventTypeRequest;
use spkm\IsamsApi\Support\JsonPatch;

class LifeEventTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\LifeEventTypeForCreate|array<string, mixed>  $lifeEventType
     */
    public function createLifeEventType(LifeEventTypeForCreate|array $lifeEventType): Response
    {
        return $this->connector->send(new CreateLifeEventTypeRequest($lifeEventType));
    }

    public function deleteLifeEventType(int $id): Response
    {
        return $this->connector->send(new DeleteLifeEventTypeRequest($id));
    }

    public function getLifeEventType(int $id): Response
    {
        return $this->connector->send(new GetLifeEventTypeRequest($id));
    }

    public function getLifeEventTypes(): Response
    {
        return $this->connector->send(new GetLifeEventTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchLifeEventType(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchLifeEventTypeRequest($id, $patch));
    }
}
