<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\CreateQualificationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\DeleteQualificationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\GetQualificationEvidenceTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\UpdateQualificationEvidenceTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class QualificationEvidenceTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\GetQualificationEvidenceTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetQualificationEvidenceTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\CreateQualificationEvidenceTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateQualificationEvidenceTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\DeleteQualificationEvidenceTypeRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteQualificationEvidenceTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\UpdateQualificationEvidenceTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateQualificationEvidenceTypeRequest(id: $id, listItem: $listItem));
    }
}
