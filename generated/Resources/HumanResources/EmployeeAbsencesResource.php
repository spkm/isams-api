<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\Absence;
use spkm\IsamsApi\Data\HumanResources\AbsenceForCreate;
use spkm\IsamsApi\Data\HumanResources\AbsenceForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\CreateEmployeeAbsenceRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\GetEmployeeAbsenceRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\GetEmployeeAbsencesRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\UpdateEmployeeAbsenceRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeAbsencesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\Absence>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\GetEmployeeAbsencesRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeAbsencesRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceForCreate|array<string, mixed>  $absence
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\CreateEmployeeAbsenceRequest
     */
    public function create(int $employeeId, AbsenceForCreate|array $absence): Created
    {
        return $this->fetch(new CreateEmployeeAbsenceRequest(employeeId: $employeeId, absence: $absence));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\GetEmployeeAbsenceRequest
     */
    public function get(int $employeeId, int $absenceId): Absence
    {
        return $this->fetch(new GetEmployeeAbsenceRequest(employeeId: $employeeId, absenceId: $absenceId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceForUpdate|array<string, mixed>  $absence
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences\UpdateEmployeeAbsenceRequest
     */
    public function update(int $employeeId, int $id, AbsenceForUpdate|array $absence): void
    {
        $this->fetch(new UpdateEmployeeAbsenceRequest(employeeId: $employeeId, id: $id, absence: $absence));
    }
}
