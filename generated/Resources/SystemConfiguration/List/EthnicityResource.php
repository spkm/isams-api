<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\CreateEthnicityRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\DeleteEthnicityRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\GetEthnicitiesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\UpdateEthnicityRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EthnicityResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemWithCensusData>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\GetEthnicitiesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetEthnicitiesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\CreateEthnicityRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateEthnicityRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\DeleteEthnicityRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteEthnicityRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\UpdateEthnicityRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateEthnicityRequest(id: $id, listItem: $listItem));

        return true;
    }
}
