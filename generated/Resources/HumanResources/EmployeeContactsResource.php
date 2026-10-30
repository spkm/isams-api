<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\HumanResources\EmployeeContacts\GetEmployeeContactsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeContactsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\EmployeeContact>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeContacts\GetEmployeeContactsRequest
     */
    public function all(int $employeeId): Collection
    {
        return $this->fetch(new GetEmployeeContactsRequest(employeeId: $employeeId));
    }
}
