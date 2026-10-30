<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheck;
use spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks\CreateEmployeeDisclosureBarringServiceCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks\GetEmployeeDisclosureBarringServiceCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks\UpdateEmployeeDisclosureBarringServiceCheckRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeDisclosureBarringServiceChecksResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheckForCreate|array<string, mixed>  $disclosureBarringServiceCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks\CreateEmployeeDisclosureBarringServiceCheckRequest
     */
    public function create(
        int $employeeId,
        DisclosureBarringServiceCheckForCreate|array $disclosureBarringServiceCheck,
    ): Created {
        return $this->fetch(new CreateEmployeeDisclosureBarringServiceCheckRequest(employeeId: $employeeId, disclosureBarringServiceCheck: $disclosureBarringServiceCheck));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks\GetEmployeeDisclosureBarringServiceCheckRequest
     */
    public function get(int $employeeId): DisclosureBarringServiceCheck
    {
        return $this->fetch(new GetEmployeeDisclosureBarringServiceCheckRequest(employeeId: $employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheckForUpdate|array<string, mixed>  $disclosureBarringServiceCheck
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks\UpdateEmployeeDisclosureBarringServiceCheckRequest
     */
    public function update(
        int $employeeId,
        DisclosureBarringServiceCheckForUpdate|array $disclosureBarringServiceCheck,
    ): bool {
        $this->fetch(new UpdateEmployeeDisclosureBarringServiceCheckRequest(employeeId: $employeeId, disclosureBarringServiceCheck: $disclosureBarringServiceCheck));

        return true;
    }
}
