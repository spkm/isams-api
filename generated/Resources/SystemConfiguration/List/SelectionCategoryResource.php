<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\CreateSelectionCategoryRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\DeleteSelectionCategoryRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\GetSelectionCategoriesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\UpdateSelectionCategoryRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SelectionCategoryResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\GetSelectionCategoriesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetSelectionCategoriesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\CreateSelectionCategoryRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateSelectionCategoryRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\DeleteSelectionCategoryRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteSelectionCategoryRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\UpdateSelectionCategoryRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateSelectionCategoryRequest(id: $id, listItem: $listItem));
    }
}
