<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use spkm\IsamsApi\Data\HumanResources\EmployeeTeachingProhibitionCheck;
use spkm\IsamsApi\Data\HumanResources\EmployeeTeachingProhibitionCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeTeachingProhibitionChecks\GetEmployeeTeachingProhibitionCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeTeachingProhibitionChecks\UpdateEmployeeTeachingProhibitionCheckRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeTeachingProhibitionChecksResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeTeachingProhibitionChecks\GetEmployeeTeachingProhibitionCheckRequest
     */
    public function get(int $employeeId): ?EmployeeTeachingProhibitionCheck
    {
        return $this->fetch(new GetEmployeeTeachingProhibitionCheckRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeTeachingProhibitionCheckForUpdate|array<string, mixed>  $employeeTeachingProhibitionCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeTeachingProhibitionChecks\UpdateEmployeeTeachingProhibitionCheckRequest
     */
    public function update(
        int $employeeId,
        EmployeeTeachingProhibitionCheckForUpdate|array $employeeTeachingProhibitionCheck,
    ): bool {
        $this->fetch(new UpdateEmployeeTeachingProhibitionCheckRequest(employeeId: $employeeId, employeeTeachingProhibitionCheck: $employeeTeachingProhibitionCheck));

        return true;
    }
}
