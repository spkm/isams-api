<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ActionOutcomeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\CreateConcernActionOutcomeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\DeleteConcernActionOutcomeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\GetConcernActionOutcomeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\GetConcernActionOutcomesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\PatchConcernActionOutcomeRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernActionOutcomesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetConcernActionOutcomesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ActionOutcomeForCreate|array<string, mixed>  $actionOutcome
     */
    public function create(ActionOutcomeForCreate|array $actionOutcome): Response
    {
        return $this->connector->send(new CreateConcernActionOutcomeRequest($actionOutcome));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteConcernActionOutcomeRequest($id));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetConcernActionOutcomeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernActionOutcomeRequest($id, $patch));
    }
}
