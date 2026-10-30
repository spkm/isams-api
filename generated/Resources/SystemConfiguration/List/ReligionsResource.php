<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\CreateReligionRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\DeleteReligionRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\GetReligionsRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\UpdateReligionRequest;

class ReligionsResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetReligionsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateReligionRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteReligionRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateReligionRequest($id, $listItem));
    }
}
