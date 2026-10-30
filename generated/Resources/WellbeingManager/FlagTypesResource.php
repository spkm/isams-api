<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\FlagTypeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\CreateFlagTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\DeleteFlagTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\GetFlagTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\GetFlagTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\FlagTypes\PatchFlagTypeRequest;
use spkm\IsamsApi\Support\JsonPatch;

class FlagTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\FlagTypeForCreate|array<string, mixed>  $flagType
     */
    public function createFlagType(FlagTypeForCreate|array $flagType): Response
    {
        return $this->connector->send(new CreateFlagTypeRequest($flagType));
    }

    public function deleteFlagType(int $id): Response
    {
        return $this->connector->send(new DeleteFlagTypeRequest($id));
    }

    public function getFlagType(int $id): Response
    {
        return $this->connector->send(new GetFlagTypeRequest($id));
    }

    public function getFlagTypes(): Response
    {
        return $this->connector->send(new GetFlagTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchFlagType(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchFlagTypeRequest($id, $patch));
    }
}
