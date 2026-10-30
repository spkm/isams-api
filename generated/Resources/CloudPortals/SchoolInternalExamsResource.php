<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsEntriesForSessionRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsResultsForSessionRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsForEntriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsForResultsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsRequest;

class SchoolInternalExamsResource extends BaseResource
{
    public function getInternalExamsEntriesForSession(string $schoolId, int $sessionId): Response
    {
        return $this->connector->send(new GetInternalExamsEntriesForSessionRequest($schoolId, $sessionId));
    }

    public function getInternalExamsResultsForSession(string $schoolId, int $sessionId): Response
    {
        return $this->connector->send(new GetInternalExamsResultsForSessionRequest($schoolId, $sessionId));
    }

    public function getInternalExamsSessions(): Response
    {
        return $this->connector->send(new GetInternalExamsSessionsRequest());
    }

    public function getInternalExamsSessionsForEntries(string $schoolId): Response
    {
        return $this->connector->send(new GetInternalExamsSessionsForEntriesRequest($schoolId));
    }

    public function getInternalExamsSessionsForResults(string $schoolId): Response
    {
        return $this->connector->send(new GetInternalExamsSessionsForResultsRequest($schoolId));
    }
}
