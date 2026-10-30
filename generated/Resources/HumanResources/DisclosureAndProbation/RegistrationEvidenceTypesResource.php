<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbation;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\CreateRegistrationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\DeleteRegistrationEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\GetRegistrationEvidenceTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes\UpdateRegistrationEvidenceTypeRequest;

class RegistrationEvidenceTypesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetRegistrationEvidenceTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateRegistrationEvidenceTypeRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteRegistrationEvidenceTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateRegistrationEvidenceTypeRequest($id, $listItem));
    }
}
