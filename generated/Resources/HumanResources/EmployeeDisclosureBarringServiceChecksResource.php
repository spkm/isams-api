<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheckForCreate;
use spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheckForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks\CreateEmployeeDisclosureBarringServiceCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks\GetEmployeeDisclosureBarringServiceCheckRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks\UpdateEmployeeDisclosureBarringServiceCheckRequest;

class EmployeeDisclosureBarringServiceChecksResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheckForCreate|array<string, mixed>  $disclosureBarringServiceCheck
     */
    public function create(
        int $employeeId,
        DisclosureBarringServiceCheckForCreate|array $disclosureBarringServiceCheck,
    ): Response {
        return $this->connector->send(new CreateEmployeeDisclosureBarringServiceCheckRequest($employeeId, $disclosureBarringServiceCheck));
    }

    public function get(int $employeeId): Response
    {
        return $this->connector->send(new GetEmployeeDisclosureBarringServiceCheckRequest($employeeId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheckForUpdate|array<string, mixed>  $disclosureBarringServiceCheck
     */
    public function update(
        int $employeeId,
        DisclosureBarringServiceCheckForUpdate|array $disclosureBarringServiceCheck,
    ): Response {
        return $this->connector->send(new UpdateEmployeeDisclosureBarringServiceCheckRequest($employeeId, $disclosureBarringServiceCheck));
    }
}
