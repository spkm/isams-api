<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\CreateReligionRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\DeleteReligionRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\GetReligionsRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\UpdateReligionRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ReligionsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemWithCensusData>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\GetReligionsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetReligionsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\CreateReligionRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateReligionRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\DeleteReligionRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteReligionRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\UpdateReligionRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateReligionRequest(id: $id, listItem: $listItem));

        return true;
    }
}
