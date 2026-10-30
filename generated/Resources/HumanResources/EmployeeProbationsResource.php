<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use spkm\IsamsApi\Data\HumanResources\EmployeeProbation;
use spkm\IsamsApi\Data\HumanResources\EmployeeProbationForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeProbations\GetEmployeeProbationRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeProbations\UpdateEmployeeProbationRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeProbationsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeProbations\GetEmployeeProbationRequest
     */
    public function get(int $employeeId): ?EmployeeProbation
    {
        return $this->fetch(new GetEmployeeProbationRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeProbationForUpdate|array<string, mixed>  $employeeProbation
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeProbations\UpdateEmployeeProbationRequest
     */
    public function update(int $employeeId, EmployeeProbationForUpdate|array $employeeProbation): bool
    {
        $this->fetch(new UpdateEmployeeProbationRequest(employeeId: $employeeId, employeeProbation: $employeeProbation));

        return true;
    }
}
