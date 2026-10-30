<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\AbsenceForCreate;
use spkm\IsamsApi\Data\HumanResources\AbsenceForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\CreateEmployeeAbsenceRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\GetEmployeeAbsenceRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\GetEmployeeAbsencesRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\UpdateEmployeeAbsenceRequest;

class EmployeeAbsencesResource extends BaseResource
{
    public function all(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeAbsencesRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceForCreate|array<string, mixed>  $absence
     */
    public function create(int $employeeId, AbsenceForCreate|array $absence): Response
    {
        return $this->connector->send(new CreateEmployeeAbsenceRequest($employeeId, $absence));
    }

    public function get(int $employeeId, int $absenceId): Response
    {
        return $this->connector->send(new GetEmployeeAbsenceRequest($employeeId, $absenceId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceForUpdate|array<string, mixed>  $absence
     */
    public function update(int $employeeId, int $id, AbsenceForUpdate|array $absence): Response
    {
        return $this->connector->send(new UpdateEmployeeAbsenceRequest($employeeId, $id, $absence));
    }
}
