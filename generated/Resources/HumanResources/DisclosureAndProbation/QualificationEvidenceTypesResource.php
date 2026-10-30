<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\CreateQualificationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\DeleteQualificationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\GetQualificationEvidenceTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes\UpdateQualificationEvidenceTypeRequest;

class QualificationEvidenceTypesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetQualificationEvidenceTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateQualificationEvidenceTypeRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteQualificationEvidenceTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateQualificationEvidenceTypeRequest($id, $listItem));
    }
}
