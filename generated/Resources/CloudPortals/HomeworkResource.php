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

class HomeworkResource extends BaseResource
{
    public function downloadHomework(int $homeworkId, int $resourceId): Response
    {
        return $this->connector->send(new DownloadHomeworkRequest($homeworkId, $resourceId));
    }

    public function getHomeworkById(int $id): Response
    {
        return $this->connector->send(new GetHomeworkByIdRequest($id));
    }

    public function getHomeworkInitialFeedback(int $homeworkId, string $schoolId): Response
    {
        return $this->connector->send(new GetHomeworkInitialFeedbackRequest($homeworkId, $schoolId));
    }

    public function getHomeworkPaged(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetHomeworkPagedRequest($page, $pageSize, $filter));
    }

    public function getHomeworkResourcesByHomeworkId(int $homeworkId): Response
    {
        return $this->connector->send(new GetHomeworkResourcesByHomeworkIdRequest($homeworkId));
    }
}
