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
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernTypeForCreate|array<string, mixed>  $concernType
     */
    public function createConcernType(ConcernTypeForCreate|array $concernType): Response
    {
        return $this->connector->send(new CreateConcernTypeRequest($concernType));
    }

    public function deleteConcernType(int $id): Response
    {
        return $this->connector->send(new DeleteConcernTypeRequest($id));
    }

    public function getConcernType(int $id): Response
    {
        return $this->connector->send(new GetConcernTypeRequest($id));
    }

    public function getConcernTypes(): Response
    {
        return $this->connector->send(new GetConcernTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchConcernType(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernTypeRequest($id, $patch));
    }
}
