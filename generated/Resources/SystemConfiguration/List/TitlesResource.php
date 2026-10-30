<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\CreateTitleRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\DeleteTitleRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\GetTitlesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\UpdateTitleRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class TitlesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\GetTitlesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetTitlesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\CreateTitleRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateTitleRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\DeleteTitleRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteTitleRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Titles\UpdateTitleRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateTitleRequest(id: $id, listItem: $listItem));
    }
}
