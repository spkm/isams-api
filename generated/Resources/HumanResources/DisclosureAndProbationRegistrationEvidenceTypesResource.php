<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\CreateRegistrationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\DeleteRegistrationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\GetRegistrationEvidenceTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\UpdateRegistrationEvidenceTypeRequest;

class DisclosureAndProbationRegistrationEvidenceTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createRegistrationEvidenceType(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateRegistrationEvidenceTypeRequest($globalListItem));
    }

    public function deleteRegistrationEvidenceType(int $id): Response
    {
        return $this->connector->send(new DeleteRegistrationEvidenceTypeRequest($id));
    }

    public function getRegistrationEvidenceTypes(): Response
    {
        return $this->connector->send(new GetRegistrationEvidenceTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateRegistrationEvidenceType(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateRegistrationEvidenceTypeRequest($id, $globalListItem));
    }
}
