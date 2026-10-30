<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\CreatePassportPlaceIssuedRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\DeletePassportPlaceIssuedRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\GetPassportPlacesIssuedRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\UpdatePassportPlaceIssuedRequest;

class PassportPlaceIssuedResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreatePassportPlaceIssuedRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeletePassportPlaceIssuedRequest($id));
    }

    public function get(): Response
    {
        return $this->connector->send(new GetPassportPlacesIssuedRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdatePassportPlaceIssuedRequest($id, $listItem));
    }
}
