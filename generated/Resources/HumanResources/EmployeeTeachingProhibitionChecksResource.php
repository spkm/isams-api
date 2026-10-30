<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\EmployeeTeachingProhibitionCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeTeachingProhibitionChecks\GetEmployeeTeachingProhibitionCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeTeachingProhibitionChecks\UpdateEmployeeTeachingProhibitionCheckRequest;

class EmployeeTeachingProhibitionChecksResource extends BaseResource
{
    public function getEmployeeTeachingProhibitionCheck(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeTeachingProhibitionCheckRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeTeachingProhibitionCheckForUpdate|array<string, mixed>  $employeeTeachingProhibitionCheck
     */
    public function updateEmployeeTeachingProhibitionCheck(
        int $employeeId,
        EmployeeTeachingProhibitionCheckForUpdate|array $employeeTeachingProhibitionCheck,
    ): Response {
        return $this->connector->send(new UpdateEmployeeTeachingProhibitionCheckRequest($employeeId, $employeeTeachingProhibitionCheck));
    }
}
