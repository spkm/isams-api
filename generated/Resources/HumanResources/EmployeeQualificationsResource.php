<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\QualificationForCreate;
use spkm\IsamsApi\Data\HumanResources\QualificationForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\CreateEmployeeQualificationRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\DeleteEmployeeQualificationRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\GetEmployeeQualificationsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\UpdateEmployeeQualificationRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeQualificationsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\Qualification>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\GetEmployeeQualificationsRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeQualificationsRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\QualificationForCreate|array<string, mixed>  $qualification
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\CreateEmployeeQualificationRequest
     */
    public function create(int $employeeId, QualificationForCreate|array $qualification): Created
    {
        return $this->fetch(new CreateEmployeeQualificationRequest(employeeId: $employeeId, qualification: $qualification));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\DeleteEmployeeQualificationRequest
     */
    public function delete(int $employeeId, int $qualificationId): bool
    {
        $this->fetch(new DeleteEmployeeQualificationRequest(employeeId: $employeeId, qualificationId: $qualificationId));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\QualificationForUpdate|array<string, mixed>  $qualification
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\UpdateEmployeeQualificationRequest
     */
    public function update(int $employeeId, int $qualificationId, QualificationForUpdate|array $qualification): bool
    {
        $this->fetch(new UpdateEmployeeQualificationRequest(employeeId: $employeeId, qualificationId: $qualificationId, qualification: $qualification));

        return true;
    }
}
