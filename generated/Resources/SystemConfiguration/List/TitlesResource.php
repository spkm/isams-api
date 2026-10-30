<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\CreateTitleRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\DeleteTitleRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\GetTitlesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\UpdateTitleRequest;

class TitlesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetTitlesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateTitleRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteTitleRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateTitleRequest($id, $listItem));
    }
}
