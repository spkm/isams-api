<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Gradebooks\CalculationColumnStructure;
use spkm\IsamsApi\Data\Gradebooks\CalculationColumnStructureForCreate;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumn\CreateCalculationColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumn\DeleteCalculationColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumn\GetCalculationColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\CalculationColumn\PatchCalculationColumnRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class CalculationColumnResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\CalculationColumnStructureForCreate|array<string, mixed>  $calculationColumnStructure
     * @see \spkm\IsamsApi\Requests\Gradebooks\CalculationColumn\CreateCalculationColumnRequest
     */
    public function create(
        int $gradebookId,
        CalculationColumnStructureForCreate|array $calculationColumnStructure,
    ): Created {
        return $this->fetch(new CreateCalculationColumnRequest(gradebookId: $gradebookId, calculationColumnStructure: $calculationColumnStructure));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\CalculationColumn\DeleteCalculationColumnRequest
     */
    public function delete(int $gradebookId, int $columnId): bool
    {
        $this->fetch(new DeleteCalculationColumnRequest(gradebookId: $gradebookId, columnId: $columnId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\CalculationColumn\GetCalculationColumnRequest
     */
    public function get(int $gradebookId, int $columnId): CalculationColumnStructure
    {
        return $this->fetch(new GetCalculationColumnRequest(gradebookId: $gradebookId, columnId: $columnId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Gradebooks\CalculationColumn\PatchCalculationColumnRequest
     */
    public function patch(int $gradebookId, int $columnId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchCalculationColumnRequest(gradebookId: $gradebookId, columnId: $columnId, patch: $patch));

        return true;
    }
}
