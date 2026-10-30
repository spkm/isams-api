<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheck;
use spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks\CreateEmployeeChildrensBarredListCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks\GetEmployeeChildrensBarredListCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks\UpdateEmployeeChildrensBarredListCheckRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeChildrensBarredListChecksResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForCreate|array<string, mixed>  $childrensBarredListCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks\CreateEmployeeChildrensBarredListCheckRequest
     */
    public function create(
        int $employeeId,
        ChildrensBarredListCheckForCreate|array $childrensBarredListCheck,
    ): Created {
        return $this->fetch(new CreateEmployeeChildrensBarredListCheckRequest(employeeId: $employeeId, childrensBarredListCheck: $childrensBarredListCheck));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks\GetEmployeeChildrensBarredListCheckRequest
     */
    public function get(int $employeeId): ?ChildrensBarredListCheck
    {
        return $this->fetch(new GetEmployeeChildrensBarredListCheckRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForUpdate|array<string, mixed>  $childrensBarredListCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks\UpdateEmployeeChildrensBarredListCheckRequest
     */
    public function update(int $employeeId, ChildrensBarredListCheckForUpdate|array $childrensBarredListCheck): bool
    {
        $this->fetch(new UpdateEmployeeChildrensBarredListCheckRequest(employeeId: $employeeId, childrensBarredListCheck: $childrensBarredListCheck));

        return true;
    }
}
