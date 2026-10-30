<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\CreateDisclosureTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\DeleteDisclosureTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\GetDisclosureTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\UpdateDisclosureTypeRequest;

class TypesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetDisclosureTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateDisclosureTypeRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteDisclosureTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateDisclosureTypeRequest($id, $listItem));
    }
}
