<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\Homework\DownloadHomeworkRequest;
use spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkByIdRequest;
use spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkInitialFeedbackRequest;
use spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkPagedRequest;
use spkm\IsamsApi\Requests\CloudPortals\Homework\GetHomeworkResourcesByHomeworkIdRequest;
use spkm\IsamsApi\Resources\CloudPortals\Homework\SubmissionResource;

class HomeworkResource extends BaseResource
{
    public function submission(): SubmissionResource
    {
        return new SubmissionResource($this->connector);
    }

    public function all(?int $page = null, ?int $pageSize = null, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetHomeworkPagedRequest($page, $pageSize, $filter));
    }

    public function download(int $homeworkId, int $resourceId): Response
    {
        return $this->connector->send(new DownloadHomeworkRequest($homeworkId, $resourceId));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetHomeworkByIdRequest($id));
    }

    public function getInitialFeedback(int $homeworkId, string $schoolId): Response
    {
        return $this->connector->send(new GetHomeworkInitialFeedbackRequest($homeworkId, $schoolId));
    }

    public function getResources(int $homeworkId): Response
    {
        return $this->connector->send(new GetHomeworkResourcesByHomeworkIdRequest($homeworkId));
    }
}
