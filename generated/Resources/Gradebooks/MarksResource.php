<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Gradebooks\MarkCollectionForPatch;
use spkm\IsamsApi\Requests\Gradebooks\Marks\GetGradebookMarksRequest;
use spkm\IsamsApi\Requests\Gradebooks\Marks\GetGradebookStudentMarksRequest;
use spkm\IsamsApi\Requests\Gradebooks\Marks\UpdateGradebookMarksRequest;

class MarksResource extends BaseResource
{
    public function getGradebookMarks(int $gradebookId, ?int $page = null, ?int $pageSize = null): Response
    {
        return $this->connector->send(new GetGradebookMarksRequest($gradebookId, $page, $pageSize));
    }

    public function getGradebookStudentMarks(int $gradebookId, string $schoolId): Response
    {
        return $this->connector->send(new GetGradebookStudentMarksRequest($gradebookId, $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\MarkCollectionForPatch|array<string, mixed>  $markCollection
     */
    public function updateGradebookMarks(int $gradebookId, MarkCollectionForPatch|array $markCollection): Response
    {
        return $this->connector->send(new UpdateGradebookMarksRequest($gradebookId, $markCollection));
    }
}
