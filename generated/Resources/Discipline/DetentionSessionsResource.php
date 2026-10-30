<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Discipline;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetDetentionSessionRequest;
use spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetDetentionSessionStudentsRequest;
use spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetDetentionSessionsRequest;
use spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetStudentDetentionSessionsRequest;

class DetentionSessionsResource extends BaseResource
{
    public function getDetentionSession(int $id): Response
    {
        return $this->connector->send(new GetDetentionSessionRequest($id));
    }

    public function getDetentionSessionStudents(int $id): Response
    {
        return $this->connector->send(new GetDetentionSessionStudentsRequest($id));
    }

    public function getDetentionSessions(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetDetentionSessionsRequest($page, $pageSize, $filter));
    }

    public function getStudentDetentionSessions(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentDetentionSessionsRequest($schoolId));
    }
}
