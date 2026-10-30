<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivitiesForStudentRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivityEventsForStudentRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivityGroupsForStudentRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivitySchedulesForStudentRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ActivitiesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ActivityEvent>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivityEventsForStudentRequest
     */
    public function getEventsForStudent(string $schoolId, int $activityId): Collection
    {
        return $this->fetch(new GetActivityEventsForStudentRequest(schoolId: $schoolId, activityId: $activityId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\Activity>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivitiesForStudentRequest
     */
    public function getForStudent(string $schoolId): Collection
    {
        return $this->fetch(new GetActivitiesForStudentRequest(schoolId: $schoolId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ActivityGroup>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivityGroupsForStudentRequest
     */
    public function getGroupsForStudent(string $schoolId, int $activityId): Collection
    {
        return $this->fetch(new GetActivityGroupsForStudentRequest(schoolId: $schoolId, activityId: $activityId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\ActivitySchedule>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Activities\GetActivitySchedulesForStudentRequest
     */
    public function getSchedulesForStudent(string $schoolId, int $activityId): Collection
    {
        return $this->fetch(new GetActivitySchedulesForStudentRequest(schoolId: $schoolId, activityId: $activityId));
    }
}
