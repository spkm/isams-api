<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Homework;

use spkm\IsamsApi\Data\Homework\Submission;
use spkm\IsamsApi\Requests\CloudPortals\Homework\Submission\GetHomeworkSubmissionRequest;
use spkm\IsamsApi\Requests\CloudPortals\Homework\Submission\PatchHomeworkSubmissionRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class SubmissionResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Homework\Submission\GetHomeworkSubmissionRequest
     */
    public function get(int $homeworkId, string $schoolId): ?Submission
    {
        return $this->fetch(new GetHomeworkSubmissionRequest(homeworkId: $homeworkId, schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\CloudPortals\Homework\Submission\PatchHomeworkSubmissionRequest
     */
    public function patch(int $homeworkId, string $schoolId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchHomeworkSubmissionRequest(homeworkId: $homeworkId, schoolId: $schoolId, patch: $patch));

        return true;
    }
}
