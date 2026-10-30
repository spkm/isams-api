<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Gradebooks\Student\GetGradebookStudentsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StudentResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\GradebookStudent>
     * @see \spkm\IsamsApi\Requests\Gradebooks\Student\GetGradebookStudentsRequest
     */
    public function all(int $gradebookId): Collection
    {
        return $this->fetch(new GetGradebookStudentsRequest(gradebookId: $gradebookId));
    }
}
