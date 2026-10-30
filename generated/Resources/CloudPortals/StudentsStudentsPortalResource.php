<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Students\StudentsPortal\GetPortalStudentRequest;
use spkm\IsamsApi\Requests\CloudPortals\Students\StudentsPortal\GetPortalStudentsByPortalTypeRequest;

class StudentsStudentsPortalResource extends BaseResource
{
    public function getPortalStudent(string $schoolId): Response
    {
        return $this->connector->send(new GetPortalStudentRequest($schoolId));
    }

    public function getPortalStudentsByPortalType(string $portalType, string $divisionIdsCommaSeparated): Response
    {
        return $this->connector->send(new GetPortalStudentsByPortalTypeRequest($portalType, $divisionIdsCommaSeparated));
    }
}
