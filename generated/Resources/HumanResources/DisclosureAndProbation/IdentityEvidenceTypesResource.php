<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\CreateIdentityEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\DeleteIdentityEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\GetIdentityEvidenceTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\UpdateIdentityEvidenceTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class IdentityEvidenceTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\GetIdentityEvidenceTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetIdentityEvidenceTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\CreateIdentityEvidenceTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateIdentityEvidenceTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\DeleteIdentityEvidenceTypeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteIdentityEvidenceTypeRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\UpdateIdentityEvidenceTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateIdentityEvidenceTypeRequest(id: $id, listItem: $listItem));

        return true;
    }
}
