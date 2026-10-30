<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\LifeEventForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\CreateLifeEventRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\DeleteLifeEventRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\GetLifeEventRequest;
use spkm\IsamsApi\Requests\WellbeingManager\LifeEvents\PatchLifeEventRequest;
use spkm\IsamsApi\Support\JsonPatch;

class LifeEventsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\LifeEventForCreate|array<string, mixed>  $lifeEvent
     */
    public function create(string $schoolId, LifeEventForCreate|array $lifeEvent): Response
    {
        return $this->connector->send(new CreateLifeEventRequest($schoolId, $lifeEvent));
    }

    public function delete(string $schoolId, int $id): Response
    {
        return $this->connector->send(new DeleteLifeEventRequest($schoolId, $id));
    }

    public function get(string $schoolId, int $id): Response
    {
        return $this->connector->send(new GetLifeEventRequest($schoolId, $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchLifeEventRequest($schoolId, $id, $patch));
    }
}
