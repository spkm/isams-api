<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\CreateContractEmployeeLevelRequest;
use spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\DeleteContractEmployeeLevelRequest;
use spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\GetContractEmployeeLevelsRequest;
use spkm\IsamsApi\Requests\HumanResources\ContractEmployeeLevels\UpdateContractEmployeeLevelRequest;

class ContractEmployeeLevelsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createContractEmployeeLevel(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateContractEmployeeLevelRequest($globalListItem));
    }

    public function deleteContractEmployeeLevel(int $id): Response
    {
        return $this->connector->send(new DeleteContractEmployeeLevelRequest($id));
    }

    public function getContractEmployeeLevels(): Response
    {
        return $this->connector->send(new GetContractEmployeeLevelsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateContractEmployeeLevel(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateContractEmployeeLevelRequest($id, $globalListItem));
    }
}
