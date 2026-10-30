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
    public function all(): Response
    {
        return $this->connector->send(new GetEmploymentTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateEmploymentTypeRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteEmploymentTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateEmploymentTypeRequest($id, $listItem));
    }
}
