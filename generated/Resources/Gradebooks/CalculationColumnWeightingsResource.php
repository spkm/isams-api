<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumnWeightings\CreateCalculationColumnWeightingsRequest;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumnWeightings\DeleteCalculationColumnWeightingRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CalculationColumnWeightingsResource extends IsamsResource
{
    /**
     * @param  array<mixed>  $weightingElementIds
     * @see \spkm\IsamsApi\Requests\Gradebooks\CalculationColumnWeightings\CreateCalculationColumnWeightingsRequest
     */
    public function createMany(int $gradebookId, int $columnId, array $weightingElementIds): Created
    {
        return $this->fetch(new CreateCalculationColumnWeightingsRequest(gradebookId: $gradebookId, columnId: $columnId, weightingElementIds: $weightingElementIds));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\CalculationColumnWeightings\DeleteCalculationColumnWeightingRequest
     */
    public function delete(int $gradebookId, int $columnId, int $weightingId): void
    {
        $this->fetch(new DeleteCalculationColumnWeightingRequest(gradebookId: $gradebookId, columnId: $columnId, weightingId: $weightingId));
    }
}
