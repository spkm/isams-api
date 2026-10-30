<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\School\Department;
use spkm\IsamsApi\Requests\School\Departments\GetDepartmentRequest;
use spkm\IsamsApi\Requests\School\Departments\GetDepartmentsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DepartmentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, mixed>
     * @see \spkm\IsamsApi\Requests\School\Departments\GetDepartmentsRequest
     */
    public function all(string $departmentType, ?string $expand = null): Collection
    {
        return $this->fetch(new GetDepartmentsRequest(departmentType: $departmentType, expand: $expand));
    }

    /**
     * @see \spkm\IsamsApi\Requests\School\Departments\GetDepartmentRequest
     */
    public function get(string $departmentType, int $id): Department
    {
        return $this->fetch(new GetDepartmentRequest(departmentType: $departmentType, id: $id));
    }
}
