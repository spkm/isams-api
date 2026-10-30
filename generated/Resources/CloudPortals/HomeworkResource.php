<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Data\Homework\Homework;
use spkm\IsamsApi\Data\Homework\StudentHomework;
use spkm\IsamsApi\Requests\CloudPortals\Homework\DownloadHomeworkRequest;
use spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkInitialFeedbackRequest;
use spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkPagedRequest;
use spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkResourcesByHomeworkIdRequest;
use spkm\IsamsApi\Resources\CloudPortals\Homework\SubmissionResource;
use spkm\IsamsApi\Resources\IsamsResource;

class HomeworkResource extends IsamsResource
{
    public function submission(): SubmissionResource
    {
        return new SubmissionResource($this->connector);
    }

    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Homework\StudentHomework>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkPagedRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetHomeworkPagedRequest(filter: $filter), StudentHomework::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Homework\DownloadHomeworkRequest
     */
    public function download(int $homeworkId, int $resourceId): File
    {
        return $this->fetch(new DownloadHomeworkRequest(homeworkId: $homeworkId, resourceId: $resourceId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkByIdRequest
     */
    public function get(int $id): Homework
    {
        return $this->fetch(new GetHomeworkByIdRequest(id: $id));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Homework\SubmissionFeedback>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkInitialFeedbackRequest
     */
    public function getInitialFeedback(int $homeworkId, string $schoolId): Collection
    {
        return $this->fetch(new GetHomeworkInitialFeedbackRequest(homeworkId: $homeworkId, schoolId: $schoolId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Homework\Resource>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkResourcesByHomeworkIdRequest
     */
    public function getResources(int $homeworkId): Collection
    {
        return $this->fetch(new GetHomeworkResourcesByHomeworkIdRequest(homeworkId: $homeworkId));
    }
}
