<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\CreateCountryRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\DeleteCountryRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\GetCountriesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Countries\UpdateCountryRequest;

class ListCountriesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createCountry(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateCountryRequest($globalListItem));
    }

    public function deleteCountry(int $id): Response
    {
        return $this->connector->send(new DeleteCountryRequest($id));
    }

    public function getCountries(): Response
    {
        return $this->connector->send(new GetCountriesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateCountry(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateCountryRequest($id, $globalListItem));
    }
}
