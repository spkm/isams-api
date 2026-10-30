<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\CreateCountyRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\DeleteCountyRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\GetCountiesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Counties\UpdateCountyRequest;

class CountiesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetCountiesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateCountyRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteCountyRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateCountyRequest($id, $listItem));
    }
}
