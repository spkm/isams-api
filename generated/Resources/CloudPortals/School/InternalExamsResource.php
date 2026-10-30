<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsEntriesForSessionRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsResultsForSessionRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsForEntriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsForResultsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class InternalExamsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\InternalExamEntry>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsEntriesForSessionRequest
     */
    public function getEntriesForSession(string $schoolId, int $sessionId): Collection
    {
        return $this->fetch(new GetInternalExamsEntriesForSessionRequest(schoolId: $schoolId, sessionId: $sessionId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\InternalExamResult>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsResultsForSessionRequest
     */
    public function getResultsForSession(string $schoolId, int $sessionId): Collection
    {
        return $this->fetch(new GetInternalExamsResultsForSessionRequest(schoolId: $schoolId, sessionId: $sessionId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\InternalExamSession>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsRequest
     */
    public function getSessions(): Collection
    {
        return $this->fetch(new GetInternalExamsSessionsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\InternalExamSession>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsForEntriesRequest
     */
    public function getSessionsForEntries(string $schoolId): Collection
    {
        return $this->fetch(new GetInternalExamsSessionsForEntriesRequest(schoolId: $schoolId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\InternalExamSession>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InternalExams\GetInternalExamsSessionsForResultsRequest
     */
    public function getSessionsForResults(string $schoolId): Collection
    {
        return $this->fetch(new GetInternalExamsSessionsForResultsRequest(schoolId: $schoolId));
    }
}
