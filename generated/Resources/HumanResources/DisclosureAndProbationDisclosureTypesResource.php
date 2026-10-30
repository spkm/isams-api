<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\DisclosureTypes\CreateDisclosureTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\DisclosureTypes\DeleteDisclosureTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\DisclosureTypes\GetDisclosureTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\DisclosureTypes\UpdateDisclosureTypeRequest;

class DisclosureAndProbationDisclosureTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createDisclosureType(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateDisclosureTypeRequest($globalListItem));
    }

    public function deleteDisclosureType(int $id): Response
    {
        return $this->connector->send(new DeleteDisclosureTypeRequest($id));
    }

    public function getDisclosureTypes(): Response
    {
        return $this->connector->send(new GetDisclosureTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateDisclosureType(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateDisclosureTypeRequest($id, $globalListItem));
    }
}
