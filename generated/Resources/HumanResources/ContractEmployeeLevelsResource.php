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
    public function all(): Response
    {
        return $this->connector->send(new GetContractEmployeeLevelsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateContractEmployeeLevelRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteContractEmployeeLevelRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateContractEmployeeLevelRequest($id, $listItem));
    }
}
