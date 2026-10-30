<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Gradebooks\CalculationColumnStructureForCreate;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumnStructure\CreateCalculationColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumnStructure\DeleteCalculationColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumnStructure\GetCalculationColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumnStructure\PatchCalculationColumnRequest;
use spkm\IsamsApi\Support\JsonPatch;

class CalculationColumnStructureResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\CalculationColumnStructureForCreate|array<string, mixed>  $calculationColumnStructure
     */
    public function createCalculationColumn(
        int $gradebookId,
        CalculationColumnStructureForCreate|array $calculationColumnStructure,
    ): Response {
        return $this->connector->send(new CreateCalculationColumnRequest($gradebookId, $calculationColumnStructure));
    }

    public function deleteCalculationColumn(int $gradebookId, int $columnId): Response
    {
        return $this->connector->send(new DeleteCalculationColumnRequest($gradebookId, $columnId));
    }

    public function getCalculationColumn(int $gradebookId, int $columnId): Response
    {
        return $this->connector->send(new GetCalculationColumnRequest($gradebookId, $columnId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchCalculationColumn(int $gradebookId, int $columnId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchCalculationColumnRequest($gradebookId, $columnId, $patch));
    }
}
