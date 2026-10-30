<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\CreateTitleRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\DeleteTitleRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\GetTitlesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\UpdateTitleRequest;

class ListTitlesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createTitle(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateTitleRequest($globalListItem));
    }

    public function deleteTitle(int $id): Response
    {
        return $this->connector->send(new DeleteTitleRequest($id));
    }

    public function getTitles(): Response
    {
        return $this->connector->send(new GetTitlesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateTitle(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateTitleRequest($id, $globalListItem));
    }
}
