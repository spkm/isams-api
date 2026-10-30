<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Gradebooks\AssessmentColumnStructure;
use spkm\IsamsApi\Data\Gradebooks\AssessmentColumnStructureForCreate;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\CreateAssessmentColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\DeleteAssessmentColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\GetAssessmentColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\PatchAssessmentColumnRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class AssessmentColumnResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\AssessmentColumnStructureForCreate|array<string, mixed>  $assessmentColumnStructure
     * @see \spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\CreateAssessmentColumnRequest
     */
    public function create(
        int $gradebookId,
        AssessmentColumnStructureForCreate|array $assessmentColumnStructure,
    ): Created {
        return $this->fetch(new CreateAssessmentColumnRequest(gradebookId: $gradebookId, assessmentColumnStructure: $assessmentColumnStructure));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\DeleteAssessmentColumnRequest
     */
    public function delete(int $gradebookId, int $columnId): bool
    {
        $this->fetch(new DeleteAssessmentColumnRequest(gradebookId: $gradebookId, columnId: $columnId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\GetAssessmentColumnRequest
     */
    public function get(int $gradebookId, int $columnId): AssessmentColumnStructure
    {
        return $this->fetch(new GetAssessmentColumnRequest(gradebookId: $gradebookId, columnId: $columnId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\PatchAssessmentColumnRequest
     */
    public function patch(int $gradebookId, int $columnId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchAssessmentColumnRequest(gradebookId: $gradebookId, columnId: $columnId, patch: $patch));

        return true;
    }
}
