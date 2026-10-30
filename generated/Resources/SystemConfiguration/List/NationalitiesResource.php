<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\CreateNationalityRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\DeleteNationalityRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\GetNationalitiesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\UpdateNationalityRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class NationalitiesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemWithCensusData>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\GetNationalitiesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetNationalitiesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\CreateNationalityRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateNationalityRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\DeleteNationalityRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteNationalityRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\UpdateNationalityRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateNationalityRequest(id: $id, listItem: $listItem));
    }
}
