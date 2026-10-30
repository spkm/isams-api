<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\Characteristics\CreateGradebookCharacteristicsRequest;
use spkm\IsamsApi\Requests\Gradebooks\Characteristics\DeleteGradebookCharacteristicRequest;

class CharacteristicsResource extends BaseResource
{
    /**
     * @param  array<mixed>  $characteristics
     */
    public function createGradebookCharacteristics(int $gradebookId, array $characteristics): Response
    {
        return $this->connector->send(new CreateGradebookCharacteristicsRequest($gradebookId, $characteristics));
    }

    public function deleteGradebookCharacteristic(int $gradebookId, string $characteristic): Response
    {
        return $this->connector->send(new DeleteGradebookCharacteristicRequest($gradebookId, $characteristic));
    }
}
