<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Discipline;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Discipline\DetentionSession;
use spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetDetentionSessionRequest;
use spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetDetentionSessionStudentsRequest;
use spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetDetentionSessionsRequest;
use spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetStudentDetentionSessionsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DetentionSessionsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Discipline\DetentionSession>
     * @see \spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetDetentionSessionsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetDetentionSessionsRequest(filter: $filter), DetentionSession::class);
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Discipline\DetentionSessionStudent>
     * @see \spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetStudentDetentionSessionsRequest
     */
    public function forStudent(string $schoolId): Collection
    {
        return $this->fetch(new GetStudentDetentionSessionsRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetDetentionSessionRequest
     */
    public function get(int $id): DetentionSession
    {
        return $this->fetch(new GetDetentionSessionRequest(id: $id));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Discipline\DetentionSessionStudent>
     * @see \spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetDetentionSessionStudentsRequest
     */
    public function students(int $id): Collection
    {
        return $this->fetch(new GetDetentionSessionStudentsRequest(id: $id));
    }
}
