<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernInjuryTypeForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\CreateConcernInjuryTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\DeleteConcernInjuryTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\GetConcernInjuryTypeRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\GetConcernInjuryTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernInjuryTypes\PatchConcernInjuryTypeRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernInjuryTypesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetConcernInjuryTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernInjuryTypeForCreate|array<string, mixed>  $concernInjuryType
     */
    public function create(ConcernInjuryTypeForCreate|array $concernInjuryType): Response
    {
        return $this->connector->send(new CreateConcernInjuryTypeRequest($concernInjuryType));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteConcernInjuryTypeRequest($id));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetConcernInjuryTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernInjuryTypeRequest($id, $patch));
    }
}
