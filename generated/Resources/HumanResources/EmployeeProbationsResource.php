<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\EmployeeProbationForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeProbations\GetEmployeeProbationRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeProbations\UpdateEmployeeProbationRequest;

class EmployeeProbationsResource extends BaseResource
{
    public function getEmployeeProbation(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeProbationRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeProbationForUpdate|array<string, mixed>  $employeeProbation
     */
    public function updateEmployeeProbation(
        int $employeeId,
        EmployeeProbationForUpdate|array $employeeProbation,
    ): Response {
        return $this->connector->send(new UpdateEmployeeProbationRequest($employeeId, $employeeProbation));
    }
}
