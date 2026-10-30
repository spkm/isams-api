<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\CreateSelectionCategoryRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\DeleteSelectionCategoryRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\GetSelectionCategoriesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\SelectionCategory\UpdateSelectionCategoryRequest;

class ListSelectionCategoryResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createSelectionCategory(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateSelectionCategoryRequest($globalListItem));
    }

    public function deleteSelectionCategory(int $id): Response
    {
        return $this->connector->send(new DeleteSelectionCategoryRequest($id));
    }

    public function getSelectionCategories(): Response
    {
        return $this->connector->send(new GetSelectionCategoriesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateSelectionCategory(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateSelectionCategoryRequest($id, $globalListItem));
    }
}
