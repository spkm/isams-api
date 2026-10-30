<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsEntriesForSessionRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsResultsForSessionRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsForEntriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsForResultsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsRequest;

class InternalExamsResource extends BaseResource
{
    public function getEntriesForSession(string $schoolId, int $sessionId): Response
    {
        return $this->connector->send(new GetInternalExamsEntriesForSessionRequest($schoolId, $sessionId));
    }

    public function getResultsForSession(string $schoolId, int $sessionId): Response
    {
        return $this->connector->send(new GetInternalExamsResultsForSessionRequest($schoolId, $sessionId));
    }

    public function getSessions(): Response
    {
        return $this->connector->send(new GetInternalExamsSessionsRequest());
    }

    public function getSessionsForEntries(string $schoolId): Response
    {
        return $this->connector->send(new GetInternalExamsSessionsForEntriesRequest($schoolId));
    }

    public function getSessionsForResults(string $schoolId): Response
    {
        return $this->connector->send(new GetInternalExamsSessionsForResultsRequest($schoolId));
    }
}
