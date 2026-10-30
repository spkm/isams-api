<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsArrangementsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsCyclesForEntriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsCyclesForResultsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsCyclesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsEntriesForCycleRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsResultsForCycleRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetExamsTimetablesForCycleRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Exams\GetPortalExamsArrangementsRequest;

class SchoolExamsResource extends BaseResource
{
    public function getExamsArrangements(string $schoolId): Response
    {
        return $this->connector->send(new GetExamsArrangementsRequest($schoolId));
    }

    public function getExamsCycles(): Response
    {
        return $this->connector->send(new GetExamsCyclesRequest());
    }

    public function getExamsCyclesForEntries(string $schoolId): Response
    {
        return $this->connector->send(new GetExamsCyclesForEntriesRequest($schoolId));
    }

    public function getExamsCyclesForResults(string $schoolId): Response
    {
        return $this->connector->send(new GetExamsCyclesForResultsRequest($schoolId));
    }

    public function getExamsEntriesForCycle(string $schoolId, int $cycleId): Response
    {
        return $this->connector->send(new GetExamsEntriesForCycleRequest($schoolId, $cycleId));
    }

    public function getExamsResultsForCycle(string $schoolId, int $cycleId): Response
    {
        return $this->connector->send(new GetExamsResultsForCycleRequest($schoolId, $cycleId));
    }

    public function getExamsTimetablesForCycle(string $schoolId, int $cycleId): Response
    {
        return $this->connector->send(new GetExamsTimetablesForCycleRequest($schoolId, $cycleId));
    }

    public function getPortalExamsArrangements(string $schoolId): Response
    {
        return $this->connector->send(new GetPortalExamsArrangementsRequest($schoolId));
    }
}
