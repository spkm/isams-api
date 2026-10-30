<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivitiesForStudentRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivityEventsForStudentRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivityGroupsForStudentRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivitySchedulesForStudentRequest;

class SchoolActivitiesResource extends BaseResource
{
    public function getActivitiesForStudent(string $schoolId): Response
    {
        return $this->connector->send(new GetActivitiesForStudentRequest($schoolId));
    }

    public function getActivityEventsForStudent(string $schoolId, int $activityId): Response
    {
        return $this->connector->send(new GetActivityEventsForStudentRequest($schoolId, $activityId));
    }

    public function getActivityGroupsForStudent(string $schoolId, int $activityId): Response
    {
        return $this->connector->send(new GetActivityGroupsForStudentRequest($schoolId, $activityId));
    }

    public function getActivitySchedulesForStudent(string $schoolId, int $activityId): Response
    {
        return $this->connector->send(new GetActivitySchedulesForStudentRequest($schoolId, $activityId));
    }
}
