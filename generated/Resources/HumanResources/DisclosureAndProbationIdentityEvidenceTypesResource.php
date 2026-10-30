<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\CreateIdentityEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\DeleteIdentityEvidenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\GetIdentityEvidenceTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\IdentityEvidenceTypes\UpdateIdentityEvidenceTypeRequest;

class DisclosureAndProbationIdentityEvidenceTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createIdentityEvidenceType(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateIdentityEvidenceTypeRequest($globalListItem));
    }

    public function deleteIdentityEvidenceType(int $id): Response
    {
        return $this->connector->send(new DeleteIdentityEvidenceTypeRequest($id));
    }

    public function getIdentityEvidenceTypes(): Response
    {
        return $this->connector->send(new GetIdentityEvidenceTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateIdentityEvidenceType(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateIdentityEvidenceTypeRequest($id, $globalListItem));
    }
}
