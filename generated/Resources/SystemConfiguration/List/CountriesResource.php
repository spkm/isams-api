<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\CreateCountryRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\DeleteCountryRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\GetCountriesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\UpdateCountryRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CountriesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemWithCensusData>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\GetCountriesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetCountriesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\CreateCountryRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateCountryRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\DeleteCountryRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteCountryRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\UpdateCountryRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateCountryRequest(id: $id, listItem: $listItem));

        return true;
    }
}
