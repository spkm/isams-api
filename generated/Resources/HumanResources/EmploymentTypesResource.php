<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\CreateEmploymentTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\DeleteEmploymentTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\GetEmploymentTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\UpdateEmploymentTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmploymentTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\GetEmploymentTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetEmploymentTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\CreateEmploymentTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateEmploymentTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\DeleteEmploymentTypeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteEmploymentTypeRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\EmploymentTypes\UpdateEmploymentTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateEmploymentTypeRequest(id: $id, listItem: $listItem));

        return true;
    }
}
