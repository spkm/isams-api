<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\CreateReligionRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\DeleteReligionRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\GetReligionsRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Religions\UpdateReligionRequest;

class ListReligionsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createReligion(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateReligionRequest($globalListItem));
    }

    public function deleteReligion(int $id): Response
    {
        return $this->connector->send(new DeleteReligionRequest($id));
    }

    public function getReligions(): Response
    {
        return $this->connector->send(new GetReligionsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateReligion(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateReligionRequest($id, $globalListItem));
    }
}
