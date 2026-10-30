<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\CreateContractEmployeeLevelRequest;
use spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\DeleteContractEmployeeLevelRequest;
use spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\GetContractEmployeeLevelsRequest;
use spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\UpdateContractEmployeeLevelRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ContractEmployeeLevelsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\GetContractEmployeeLevelsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetContractEmployeeLevelsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\CreateContractEmployeeLevelRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateContractEmployeeLevelRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\DeleteContractEmployeeLevelRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteContractEmployeeLevelRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\UpdateContractEmployeeLevelRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateContractEmployeeLevelRequest(id: $id, listItem: $listItem));
    }
}
