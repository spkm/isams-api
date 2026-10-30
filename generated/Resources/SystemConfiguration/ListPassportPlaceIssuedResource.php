<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\CreatePassportPlaceIssuedRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\DeletePassportPlaceIssuedRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\GetPassportPlacesIssuedRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\UpdatePassportPlaceIssuedRequest;

class ListPassportPlaceIssuedResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createPassportPlaceIssued(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreatePassportPlaceIssuedRequest($globalListItem));
    }

    public function deletePassportPlaceIssued(int $id): Response
    {
        return $this->connector->send(new DeletePassportPlaceIssuedRequest($id));
    }

    public function getPassportPlacesIssued(): Response
    {
        return $this->connector->send(new GetPassportPlacesIssuedRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updatePassportPlaceIssued(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdatePassportPlaceIssuedRequest($id, $globalListItem));
    }
}
