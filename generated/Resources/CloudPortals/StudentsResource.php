<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Students\PrivateStudentDetailed;
use spkm\IsamsApi\Requests\CloudPortals\Students\GetPortalStudentRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\GetPortalStudentsByPortalTypeRequest;
use spkm\IsamsApi\Resources\CloudPortals\Students\ModulesResource;
use spkm\IsamsApi\Resources\CloudPortals\Students\SelfRegistrationResource;
use spkm\IsamsApi\Resources\CloudPortals\Students\TimetableResource;
use spkm\IsamsApi\Resources\IsamsResource;

class StudentsResource extends IsamsResource
{
    public function modules(): ModulesResource
    {
        return new ModulesResource($this->connector);
    }

    public function selfRegistration(): SelfRegistrationResource
    {
        return new SelfRegistrationResource($this->connector);
    }

    public function timetable(): TimetableResource
    {
        return new TimetableResource($this->connector);
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Students\GetPortalStudentRequest
     */
    public function get(string $schoolId): PrivateStudentDetailed
    {
        return $this->fetch(new GetPortalStudentRequest(schoolId: $schoolId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\PrivateStudent>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Students\GetPortalStudentsByPortalTypeRequest
     */
    public function getByPortalType(string $portalType, string $divisionIdsCommaSeparated): Collection
    {
        return $this->fetch(new GetPortalStudentsByPortalTypeRequest(portalType: $portalType, divisionIdsCommaSeparated: $divisionIdsCommaSeparated));
    }
}
