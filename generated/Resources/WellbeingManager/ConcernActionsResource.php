<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernActionForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\CreateConcernActionRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\DeleteConcernActionRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\GetConcernActionRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernActions\PatchConcernActionRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernActionsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernActionForCreate|array<string, mixed>  $concernAction
     */
    public function createConcernAction(
        string $schoolId,
        int $concernId,
        ConcernActionForCreate|array $concernAction,
    ): Response {
        return $this->connector->send(new CreateConcernActionRequest($schoolId, $concernId, $concernAction));
    }

    public function deleteConcernAction(string $schoolId, int $concernId, int $id): Response
    {
        return $this->connector->send(new DeleteConcernActionRequest($schoolId, $concernId, $id));
    }

    public function getConcernAction(string $schoolId, int $concernId, int $id): Response
    {
        return $this->connector->send(new GetConcernActionRequest($schoolId, $concernId, $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchConcernAction(string $schoolId, int $concernId, int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernActionRequest($schoolId, $concernId, $id, $patch));
    }
}
