<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Parent;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\Parent\SchoolDirectory\GetSchoolDirectoryDepartmentsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\SchoolDirectory\GetSchoolDirectoryNonTeachingStaffRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\SchoolDirectory\GetSchoolDirectoryTeachingStaffRequest;

class SchoolDirectoryResource extends BaseResource
{
    public function getDepartments(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetSchoolDirectoryDepartmentsRequest($page, $pageSize, $filter));
    }

    public function getNonTeachingStaff(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetSchoolDirectoryNonTeachingStaffRequest($page, $pageSize, $filter));
    }

    public function getTeachingStaff(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetSchoolDirectoryTeachingStaffRequest($page, $pageSize, $filter));
    }
}
