<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\CreateOfferTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\DeleteOfferTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\GetOfferTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\UpdateOfferTypeRequest;

class ListOfferTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createOfferType(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateOfferTypeRequest($globalListItem));
    }

    public function deleteOfferType(int $id): Response
    {
        return $this->connector->send(new DeleteOfferTypeRequest($id));
    }

    public function getOfferTypes(): Response
    {
        return $this->connector->send(new GetOfferTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateOfferType(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateOfferTypeRequest($id, $globalListItem));
    }
}
