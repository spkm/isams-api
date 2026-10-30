<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\CreateDisclosureTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\DeleteDisclosureTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\GetDisclosureTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\UpdateDisclosureTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class TypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\GetDisclosureTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetDisclosureTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\CreateDisclosureTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateDisclosureTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\DeleteDisclosureTypeRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteDisclosureTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\Types\UpdateDisclosureTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateDisclosureTypeRequest(id: $id, listItem: $listItem));
    }
}
