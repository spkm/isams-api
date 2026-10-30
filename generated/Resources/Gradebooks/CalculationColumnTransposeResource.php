<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumnTranspose\CreateCalculationColumnTransposesRequest;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumnTranspose\DeleteCalculationColumnTransposeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CalculationColumnTransposeResource extends IsamsResource
{
    /**
     * @param  array<mixed>  $transposeIds
     * @see \spkm\IsamsApi\Requests\Gradebooks\CalculationColumnTranspose\CreateCalculationColumnTransposesRequest
     */
    public function createMany(int $gradebookId, int $columnId, array $transposeIds): Created
    {
        return $this->fetch(new CreateCalculationColumnTransposesRequest(gradebookId: $gradebookId, columnId: $columnId, transposeIds: $transposeIds));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\CalculationColumnTranspose\DeleteCalculationColumnTransposeRequest
     */
    public function delete(int $gradebookId, int $columnId, int $transposeId): bool
    {
        $this->fetch(new DeleteCalculationColumnTransposeRequest(gradebookId: $gradebookId, columnId: $columnId, transposeId: $transposeId));

        return true;
    }
}
