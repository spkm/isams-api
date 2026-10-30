<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernSeverityForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\CreateConcernSeverityRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\DeleteConcernSeverityRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\GetConcernSeveritiesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\GetConcernSeverityRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernSeverities\PatchConcernSeverityRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernSeveritiesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetConcernSeveritiesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernSeverityForCreate|array<string, mixed>  $concernSeverity
     */
    public function create(ConcernSeverityForCreate|array $concernSeverity): Response
    {
        return $this->connector->send(new CreateConcernSeverityRequest($concernSeverity));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteConcernSeverityRequest($id));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetConcernSeverityRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernSeverityRequest($id, $patch));
    }
}
