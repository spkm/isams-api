<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\CreateRegistrationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\DeleteRegistrationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\GetRegistrationEvidenceTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\UpdateRegistrationEvidenceTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class RegistrationEvidenceTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\GetRegistrationEvidenceTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetRegistrationEvidenceTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\CreateRegistrationEvidenceTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateRegistrationEvidenceTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\DeleteRegistrationEvidenceTypeRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteRegistrationEvidenceTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\UpdateRegistrationEvidenceTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateRegistrationEvidenceTypeRequest(id: $id, listItem: $listItem));
    }
}
