<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\StudentExclusions\CreateStudentExclusionsRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentExclusions\DeleteStudentExclusionRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentExclusions\GetStudentExclusionsRequest;

class StudentExclusionsResource extends BaseResource
{
    public function all(int $gradebookId, int $columnId): Response
    {
        return $this->connector->send(new GetStudentExclusionsRequest($gradebookId, $columnId));
    }

    /**
     * @param  array<mixed>  $schoolIds
     */
    public function createMany(int $gradebookId, int $columnId, array $schoolIds): Response
    {
        return $this->connector->send(new CreateStudentExclusionsRequest($gradebookId, $columnId, $schoolIds));
    }

    public function delete(int $gradebookId, int $columnId, string $schoolId): Response
    {
        return $this->connector->send(new DeleteStudentExclusionRequest($gradebookId, $columnId, $schoolId));
    }
}
