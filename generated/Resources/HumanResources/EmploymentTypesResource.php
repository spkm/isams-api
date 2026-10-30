<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\CreateEmploymentTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\DeleteEmploymentTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\GetEmploymentTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\UpdateEmploymentTypeRequest;

class EmploymentTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createEmploymentType(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateEmploymentTypeRequest($globalListItem));
    }

    public function deleteEmploymentType(int $id): Response
    {
        return $this->connector->send(new DeleteEmploymentTypeRequest($id));
    }

    public function getEmploymentTypes(): Response
    {
        return $this->connector->send(new GetEmploymentTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateEmploymentType(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateEmploymentTypeRequest($id, $globalListItem));
    }
}
