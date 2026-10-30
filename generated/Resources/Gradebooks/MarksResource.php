<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\Gradebooks\MarkCollectionForPatch;
use spkm\IsamsApi\Data\Gradebooks\Student;
use spkm\IsamsApi\Requests\Gradebooks\Marks\GetGradebookMarksRequest;
use spkm\IsamsApi\Requests\Gradebooks\Marks\GetGradebookStudentMarksRequest;
use spkm\IsamsApi\Requests\Gradebooks\Marks\UpdateGradebookMarksRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class MarksResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Gradebooks\Student>
     * @see \spkm\IsamsApi\Requests\Gradebooks\Marks\GetGradebookMarksRequest
     */
    public function all(int $gradebookId): LazyCollection
    {
        return $this->each(new GetGradebookMarksRequest(gradebookId: $gradebookId), Student::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\Marks\GetGradebookStudentMarksRequest
     */
    public function forStudent(int $gradebookId, string $schoolId): Student
    {
        return $this->fetch(new GetGradebookStudentMarksRequest(gradebookId: $gradebookId, schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\MarkCollectionForPatch|array<string, mixed>  $markCollection
     * @see \spkm\IsamsApi\Requests\Gradebooks\Marks\UpdateGradebookMarksRequest
     */
    public function updateMany(int $gradebookId, MarkCollectionForPatch|array $markCollection): bool
    {
        $this->fetch(new UpdateGradebookMarksRequest(gradebookId: $gradebookId, markCollection: $markCollection));

        return true;
    }
}
