<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\QualificationForCreate;
use spkm\IsamsApi\Data\HumanResources\QualificationForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\CreateEmployeeQualificationRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\DeleteEmployeeQualificationRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\GetEmployeeQualificationsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications\UpdateEmployeeQualificationRequest;

class EmployeeQualificationsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\QualificationForCreate|array<string, mixed>  $qualification
     */
    public function createEmployeeQualification(
        int $employeeId,
        QualificationForCreate|array $qualification,
    ): Response {
        return $this->connector->send(new CreateEmployeeQualificationRequest($employeeId, $qualification));
    }

    public function deleteEmployeeQualification(int $employeeId, int $qualificationId): Response
    {
        return $this->connector->send(new DeleteEmployeeQualificationRequest($employeeId, $qualificationId));
    }

    public function getEmployeeQualifications(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeQualificationsRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\QualificationForUpdate|array<string, mixed>  $qualification
     */
    public function updateEmployeeQualification(
        int $employeeId,
        int $qualificationId,
        QualificationForUpdate|array $qualification,
    ): Response {
        return $this->connector->send(new UpdateEmployeeQualificationRequest($employeeId, $qualificationId, $qualification));
    }
}
