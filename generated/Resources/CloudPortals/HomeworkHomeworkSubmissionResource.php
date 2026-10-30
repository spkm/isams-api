<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Homework\HomeworkSubmission\GetHomeworkSubmissionRequest;
use spkm\IsamsApi\Requests\CloudPortals\Homework\HomeworkSubmission\PatchHomeworkSubmissionRequest;
use spkm\IsamsApi\Support\JsonPatch;

class HomeworkHomeworkSubmissionResource extends BaseResource
{
    public function getHomeworkSubmission(int $homeworkId, string $schoolId): Response
    {
        return $this->connector->send(new GetHomeworkSubmissionRequest($homeworkId, $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchHomeworkSubmission(int $homeworkId, string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchHomeworkSubmissionRequest($homeworkId, $schoolId, $patch));
    }
}
