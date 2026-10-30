<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\School\DepartmentEmployees\GetDepartmentEmployeesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DepartmentEmployeesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\Employee>
     * @see \spkm\IsamsApi\Requests\School\DepartmentEmployees\GetDepartmentEmployeesRequest
     */
    public function all(string $departmentType, int $departmentId): Collection
    {
        return $this->fetch(new GetDepartmentEmployeesRequest(departmentType: $departmentType, departmentId: $departmentId));
    }
}
