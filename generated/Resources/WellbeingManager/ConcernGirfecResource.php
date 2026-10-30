<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernGirfecFormForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec\CreateConcernGirfecFormRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec\GetConcernGirfecFormRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec\PatchConcernGirfecFormRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernGirfecResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernGirfecFormForCreate|array<string, mixed>  $form
     */
    public function createConcernGirfecForm(
        string $schoolId,
        int $concernId,
        ConcernGirfecFormForCreate|array $form,
    ): Response {
        return $this->connector->send(new CreateConcernGirfecFormRequest($schoolId, $concernId, $form));
    }

    public function getConcernGirfecForm(string $schoolId, int $concernId): Response
    {
        return $this->connector->send(new GetConcernGirfecFormRequest($schoolId, $concernId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchConcernGirfecForm(string $schoolId, int $concernId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernGirfecFormRequest($schoolId, $concernId, $patch));
    }
}
