<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\CreatePassportPlaceIssuedRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\DeletePassportPlaceIssuedRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\GetPassportPlacesIssuedRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\UpdatePassportPlaceIssuedRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PassportPlaceIssuedResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\CreatePassportPlaceIssuedRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreatePassportPlaceIssuedRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\DeletePassportPlaceIssuedRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeletePassportPlaceIssuedRequest(id: $id));

        return true;
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\GetPassportPlacesIssuedRequest
     */
    public function get(): Collection
    {
        return $this->fetch(new GetPassportPlacesIssuedRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\PassportPlaceIssued\UpdatePassportPlaceIssuedRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdatePassportPlaceIssuedRequest(id: $id, listItem: $listItem));

        return true;
    }
}
