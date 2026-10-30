<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\SchoolDirectory\GetSchoolDirectoryDepartmentsRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\SchoolDirectory\GetSchoolDirectoryNonTeachingStaffRequest;
use spkm\IsamsApi\Requests\CloudPortals\ParentPortal\SchoolDirectory\GetSchoolDirectoryTeachingStaffRequest;

class ParentPortalSchoolDirectoryResource extends BaseResource
{
    public function getSchoolDirectoryDepartments(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetSchoolDirectoryDepartmentsRequest($page, $pageSize, $filter));
    }

    public function getSchoolDirectoryNonTeachingStaff(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetSchoolDirectoryNonTeachingStaffRequest($page, $pageSize, $filter));
    }

    public function getSchoolDirectoryTeachingStaff(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetSchoolDirectoryTeachingStaffRequest($page, $pageSize, $filter));
    }
}
