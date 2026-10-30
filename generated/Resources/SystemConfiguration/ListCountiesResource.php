<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\CreateCountyRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\DeleteCountyRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\GetCountiesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\UpdateCountyRequest;

class ListCountiesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createCounty(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateCountyRequest($globalListItem));
    }

    public function deleteCounty(int $id): Response
    {
        return $this->connector->send(new DeleteCountyRequest($id));
    }

    public function getCounties(): Response
    {
        return $this->connector->send(new GetCountiesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateCounty(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateCountyRequest($id, $globalListItem));
    }
}
