<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\StudentAssignments\AddGradebookStudentAssignmentsRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentAssignments\DeleteGradebookStudentAssignmentRequest;
use spkm\IsamsApi\Requests\Gradebooks\StudentAssignments\GetGradebookStudentAssignmentsRequest;

class StudentAssignmentsResource extends BaseResource
{
    /**
     * @param  array<mixed>  $schoolIds
     */
    public function addGradebookStudentAssignments(int $gradebookId, array $schoolIds): Response
    {
        return $this->connector->send(new AddGradebookStudentAssignmentsRequest($gradebookId, $schoolIds));
    }

    public function deleteGradebookStudentAssignment(int $gradebookId, string $schoolId): Response
    {
        return $this->connector->send(new DeleteGradebookStudentAssignmentRequest($gradebookId, $schoolId));
    }

    public function getGradebookStudentAssignments(int $gradebookId): Response
    {
        return $this->connector->send(new GetGradebookStudentAssignmentsRequest($gradebookId));
    }
}
