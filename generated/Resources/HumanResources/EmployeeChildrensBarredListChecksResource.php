<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks\CreateEmployeeChildrensBarredListCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks\GetEmployeeChildrensBarredListCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks\UpdateEmployeeChildrensBarredListCheckRequest;

class EmployeeChildrensBarredListChecksResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForCreate|array<string, mixed>  $childrensBarredListCheck
     */
    public function create(
        int $employeeId,
        ChildrensBarredListCheckForCreate|array $childrensBarredListCheck,
    ): Response {
        return $this->connector->send(new CreateEmployeeChildrensBarredListCheckRequest($employeeId, $childrensBarredListCheck));
    }

    public function get(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeChildrensBarredListCheckRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForUpdate|array<string, mixed>  $childrensBarredListCheck
     */
    public function update(
        int $employeeId,
        ChildrensBarredListCheckForUpdate|array $childrensBarredListCheck,
    ): Response {
        return $this->connector->send(new UpdateEmployeeChildrensBarredListCheckRequest($employeeId, $childrensBarredListCheck));
    }
}
