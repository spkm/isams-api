<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Gradebooks\AssessmentColumnStructureForCreate;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\CreateAssessmentColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\DeleteAssessmentColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\GetAssessmentColumnRequest;
use spkm\IsamsApi\Requests\Gradebooks\AssessmentColumn\PatchAssessmentColumnRequest;
use spkm\IsamsApi\Support\JsonPatch;

class AssessmentColumnResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\AssessmentColumnStructureForCreate|array<string, mixed>  $assessmentColumnStructure
     */
    public function create(
        int $gradebookId,
        AssessmentColumnStructureForCreate|array $assessmentColumnStructure,
    ): Response {
        return $this->connector->send(new CreateAssessmentColumnRequest($gradebookId, $assessmentColumnStructure));
    }

    public function delete(int $gradebookId, int $columnId): Response
    {
        return $this->connector->send(new DeleteAssessmentColumnRequest($gradebookId, $columnId));
    }

    public function get(int $gradebookId, int $columnId): Response
    {
        return $this->connector->send(new GetAssessmentColumnRequest($gradebookId, $columnId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $gradebookId, int $columnId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchAssessmentColumnRequest($gradebookId, $columnId, $patch));
    }
}
