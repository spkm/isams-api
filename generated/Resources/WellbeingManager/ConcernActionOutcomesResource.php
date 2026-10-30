<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ActionOutcome;
use spkm\IsamsApi\Data\WellbeingManager\ActionOutcomeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\CreateConcernActionOutcomeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\DeleteConcernActionOutcomeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\GetConcernActionOutcomeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\GetConcernActionOutcomesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\PatchConcernActionOutcomeRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernActionOutcomesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ActionOutcome>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\GetConcernActionOutcomesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetConcernActionOutcomesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ActionOutcomeForCreate|array<string, mixed>  $actionOutcome
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\CreateConcernActionOutcomeRequest
     */
    public function create(ActionOutcomeForCreate|array $actionOutcome): Created
    {
        return $this->fetch(new CreateConcernActionOutcomeRequest(actionOutcome: $actionOutcome));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\DeleteConcernActionOutcomeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteConcernActionOutcomeRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\GetConcernActionOutcomeRequest
     */
    public function get(int $id): ActionOutcome
    {
        return $this->fetch(new GetConcernActionOutcomeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernActionOutcomes\PatchConcernActionOutcomeRequest
     */
    public function patch(int $id, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchConcernActionOutcomeRequest(id: $id, patch: $patch));

        return true;
    }
}
