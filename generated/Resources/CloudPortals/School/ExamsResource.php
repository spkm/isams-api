<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsArrangementsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsCyclesForEntriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsCyclesForResultsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsCyclesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsEntriesForCycleRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsResultsForCycleRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsTimetablesForCycleRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetPortalExamsArrangementsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ExamsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ExamArrangement>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsArrangementsRequest
     */
    public function getArrangements(string $schoolId): Collection
    {
        return $this->fetch(new GetExamsArrangementsRequest(schoolId: $schoolId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ExamCycle>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsCyclesRequest
     */
    public function getCycles(): Collection
    {
        return $this->fetch(new GetExamsCyclesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ExamCycle>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsCyclesForEntriesRequest
     */
    public function getCyclesForEntries(string $schoolId): Collection
    {
        return $this->fetch(new GetExamsCyclesForEntriesRequest(schoolId: $schoolId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ExamCycle>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsCyclesForResultsRequest
     */
    public function getCyclesForResults(string $schoolId): Collection
    {
        return $this->fetch(new GetExamsCyclesForResultsRequest(schoolId: $schoolId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ExamEntry>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsEntriesForCycleRequest
     */
    public function getEntriesForCycle(string $schoolId, int $cycleId): Collection
    {
        return $this->fetch(new GetExamsEntriesForCycleRequest(schoolId: $schoolId, cycleId: $cycleId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\PortalExamArrangement>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetPortalExamsArrangementsRequest
     */
    public function getPortalArrangements(string $schoolId): Collection
    {
        return $this->fetch(new GetPortalExamsArrangementsRequest(schoolId: $schoolId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ExamResult>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsResultsForCycleRequest
     */
    public function getResultsForCycle(string $schoolId, int $cycleId): Collection
    {
        return $this->fetch(new GetExamsResultsForCycleRequest(schoolId: $schoolId, cycleId: $cycleId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ExamTimetable>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsTimetablesForCycleRequest
     */
    public function getTimetablesForCycle(string $schoolId, int $cycleId): Collection
    {
        return $this->fetch(new GetExamsTimetablesForCycleRequest(schoolId: $schoolId, cycleId: $cycleId));
    }
}
