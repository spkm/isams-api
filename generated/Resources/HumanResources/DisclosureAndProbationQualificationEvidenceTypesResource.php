<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\CreateQualificationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\DeleteQualificationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\GetQualificationEvidenceTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\UpdateQualificationEvidenceTypeRequest;

class DisclosureAndProbationQualificationEvidenceTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createQualificationEvidenceType(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateQualificationEvidenceTypeRequest($globalListItem));
    }

    public function deleteQualificationEvidenceType(int $id): Response
    {
        return $this->connector->send(new DeleteQualificationEvidenceTypeRequest($id));
    }

    public function getQualificationEvidenceTypes(): Response
    {
        return $this->connector->send(new GetQualificationEvidenceTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateQualificationEvidenceType(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateQualificationEvidenceTypeRequest($id, $globalListItem));
    }
}
