<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\CreateCountyRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\DeleteCountyRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\GetCountiesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\UpdateCountyRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CountiesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemWithCensusData>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\GetCountiesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetCountiesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\CreateCountyRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateCountyRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\DeleteCountyRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteCountyRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\UpdateCountyRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateCountyRequest(id: $id, listItem: $listItem));

        return true;
    }
}
