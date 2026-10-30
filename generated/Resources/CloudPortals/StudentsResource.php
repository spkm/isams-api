<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Students\GetPortalStudentRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\GetPortalStudentsByPortalTypeRequest;
use spkm\IsamsApi\Resources\CloudPortals\Students\ModulesResource;
use spkm\IsamsApi\Resources\CloudPortals\Students\SelfRegistrationResource;
use spkm\IsamsApi\Resources\CloudPortals\Students\TimetableResource;

class StudentsResource extends BaseResource
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

    public function get(string $schoolId): Response
    {
        return $this->connector->send(new GetPortalStudentRequest($schoolId));
    }

    public function getByPortalType(string $portalType, string $divisionIdsCommaSeparated): Response
    {
        return $this->connector->send(new GetPortalStudentsByPortalTypeRequest($portalType, $divisionIdsCommaSeparated));
    }
}
