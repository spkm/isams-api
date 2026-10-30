<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\Characteristics\CreateGradebookCharacteristicsRequest;
use spkm\IsamsApi\Requests\Gradebooks\Characteristics\DeleteGradebookCharacteristicRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CharacteristicsResource extends IsamsResource
{
    /**
     * @param  array<mixed>  $characteristics
     * @see \spkm\IsamsApi\Requests\Gradebooks\Characteristics\CreateGradebookCharacteristicsRequest
     */
    public function createMany(int $gradebookId, array $characteristics): Created
    {
        return $this->fetch(new CreateGradebookCharacteristicsRequest(gradebookId: $gradebookId, characteristics: $characteristics));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\Characteristics\DeleteGradebookCharacteristicRequest
     */
    public function delete(int $gradebookId, string $characteristic): bool
    {
        $this->fetch(new DeleteGradebookCharacteristicRequest(gradebookId: $gradebookId, characteristic: $characteristic));

        return true;
    }
}
