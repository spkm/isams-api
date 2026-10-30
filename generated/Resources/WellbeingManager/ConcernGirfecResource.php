<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ConcernGirfecForm;
use spkm\IsamsApi\Data\WellbeingManager\ConcernGirfecFormForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec\CreateConcernGirfecFormRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec\GetConcernGirfecFormRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec\PatchConcernGirfecFormRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernGirfecResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernGirfecFormForCreate|array<string, mixed>  $concernGirfecForm
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec\CreateConcernGirfecFormRequest
     */
    public function createForm(
        string $schoolId,
        int $concernId,
        ConcernGirfecFormForCreate|array $concernGirfecForm,
    ): Created {
        return $this->fetch(new CreateConcernGirfecFormRequest(schoolId: $schoolId, concernId: $concernId, concernGirfecForm: $concernGirfecForm));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec\GetConcernGirfecFormRequest
     */
    public function getForm(string $schoolId, int $concernId): ConcernGirfecForm
    {
        return $this->fetch(new GetConcernGirfecFormRequest(schoolId: $schoolId, concernId: $concernId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec\PatchConcernGirfecFormRequest
     */
    public function patchForm(string $schoolId, int $concernId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchConcernGirfecFormRequest(schoolId: $schoolId, concernId: $concernId, patch: $patch));
    }
}
