<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use spkm\IsamsApi\Data\HumanResources\EmployeeFinancialInformation;
use spkm\IsamsApi\Data\HumanResources\EmployeeFinancialInformationForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeFinancialInformation\GetEmployeeFinancialInformationRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeFinancialInformation\UpdateEmployeeFinancialInformationRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeFinancialInformationResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeFinancialInformation\GetEmployeeFinancialInformationRequest
     */
    public function get(int $employeeId): EmployeeFinancialInformation
    {
        return $this->fetch(new GetEmployeeFinancialInformationRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeFinancialInformationForUpdate|array<string, mixed>  $employeeFinancialInformation
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeFinancialInformation\UpdateEmployeeFinancialInformationRequest
     */
    public function update(
        int $employeeId,
        EmployeeFinancialInformationForUpdate|array $employeeFinancialInformation,
    ): void {
        $this->fetch(new UpdateEmployeeFinancialInformationRequest(employeeId: $employeeId, employeeFinancialInformation: $employeeFinancialInformation));
    }
}
