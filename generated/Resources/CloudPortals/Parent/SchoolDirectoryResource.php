<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Parent;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\SchoolDirectory\Department;
use spkm\IsamsApi\Data\SchoolDirectory\Staff;
use spkm\IsamsApi\Requests\CloudPortals\Parent\SchoolDirectory\GetSchoolDirectoryDepartmentsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\SchoolDirectory\GetSchoolDirectoryNonTeachingStaffRequest;
use spkm\IsamsApi\Requests\CloudPortals\Parent\SchoolDirectory\GetSchoolDirectoryTeachingStaffRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SchoolDirectoryResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\SchoolDirectory\Department>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\SchoolDirectory\GetSchoolDirectoryDepartmentsRequest
     */
    public function getDepartments(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetSchoolDirectoryDepartmentsRequest(filter: $filter), Department::class);
    }

    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\SchoolDirectory\Staff>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\SchoolDirectory\GetSchoolDirectoryNonTeachingStaffRequest
     */
    public function getNonTeachingStaff(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetSchoolDirectoryNonTeachingStaffRequest(filter: $filter), Staff::class);
    }

    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\SchoolDirectory\Staff>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Parent\SchoolDirectory\GetSchoolDirectoryTeachingStaffRequest
     */
    public function getTeachingStaff(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetSchoolDirectoryTeachingStaffRequest(filter: $filter), Staff::class);
    }
}
