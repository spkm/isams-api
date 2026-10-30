<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\CreateOfferTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\DeleteOfferTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\GetOfferTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\UpdateOfferTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class OfferTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\GetOfferTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetOfferTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\CreateOfferTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateOfferTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\DeleteOfferTypeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteOfferTypeRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\OfferTypes\UpdateOfferTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateOfferTypeRequest(id: $id, listItem: $listItem));

        return true;
    }
}
