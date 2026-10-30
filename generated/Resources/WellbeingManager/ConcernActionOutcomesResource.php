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
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ActionOutcomeForCreate|array<string, mixed>  $concernActionOutcome
     */
    public function createConcernActionOutcome(ActionOutcomeForCreate|array $concernActionOutcome): Response
    {
        return $this->connector->send(new CreateConcernActionOutcomeRequest($concernActionOutcome));
    }

    public function deleteConcernActionOutcome(int $id): Response
    {
        return $this->connector->send(new DeleteConcernActionOutcomeRequest($id));
    }

    public function getConcernActionOutcome(int $id): Response
    {
        return $this->connector->send(new GetConcernActionOutcomeRequest($id));
    }

    public function getConcernActionOutcomes(): Response
    {
        return $this->connector->send(new GetConcernActionOutcomesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchConcernActionOutcome(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernActionOutcomeRequest($id, $patch));
    }
}
