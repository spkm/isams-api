<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

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

class ExamsResource extends BaseResource
{
    public function getArrangements(string $schoolId): Response
    {
        return $this->connector->send(new GetExamsArrangementsRequest($schoolId));
    }

    public function getCycles(): Response
    {
        return $this->connector->send(new GetExamsCyclesRequest());
    }

    public function getCyclesForEntries(string $schoolId): Response
    {
        return $this->connector->send(new GetExamsCyclesForEntriesRequest($schoolId));
    }

    public function getCyclesForResults(string $schoolId): Response
    {
        return $this->connector->send(new GetExamsCyclesForResultsRequest($schoolId));
    }

    public function getEntriesForCycle(string $schoolId, int $cycleId): Response
    {
        return $this->connector->send(new GetExamsEntriesForCycleRequest($schoolId, $cycleId));
    }

    public function getPortalArrangements(string $schoolId): Response
    {
        return $this->connector->send(new GetPortalExamsArrangementsRequest($schoolId));
    }

    public function getResultsForCycle(string $schoolId, int $cycleId): Response
    {
        return $this->connector->send(new GetExamsResultsForCycleRequest($schoolId, $cycleId));
    }

    public function getTimetablesForCycle(string $schoolId, int $cycleId): Response
    {
        return $this->connector->send(new GetExamsTimetablesForCycleRequest($schoolId, $cycleId));
    }
}
