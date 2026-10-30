<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumnTranspose\CreateCalculationColumnTransposesRequest;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumnTranspose\DeleteCalculationColumnTransposeRequest;

class CalculationColumnTransposeResource extends BaseResource
{
    /**
     * @param  array<mixed>  $transposeIds
     */
    public function createCalculationColumnTransposes(int $gradebookId, int $columnId, array $transposeIds): Response
    {
        return $this->connector->send(new CreateCalculationColumnTransposesRequest($gradebookId, $columnId, $transposeIds));
    }

    public function deleteCalculationColumnTranspose(int $gradebookId, int $columnId, int $transposeId): Response
    {
        return $this->connector->send(new DeleteCalculationColumnTransposeRequest($gradebookId, $columnId, $transposeId));
    }
}
