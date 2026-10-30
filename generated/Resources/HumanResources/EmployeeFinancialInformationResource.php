<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\EmployeeFinancialInformationForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeFinancialInformation\GetEmployeeFinancialInformationRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeFinancialInformation\UpdateEmployeeFinancialInformationRequest;

class EmployeeFinancialInformationResource extends BaseResource
{
    public function get(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeFinancialInformationRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeFinancialInformationForUpdate|array<string, mixed>  $employeeFinancialInformation
     */
    public function update(
        int $employeeId,
        EmployeeFinancialInformationForUpdate|array $employeeFinancialInformation,
    ): Response {
        return $this->connector->send(new UpdateEmployeeFinancialInformationRequest($employeeId, $employeeFinancialInformation));
    }
}
