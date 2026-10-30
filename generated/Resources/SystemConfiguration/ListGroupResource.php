<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListRuleForCreate;
use spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\CreateCustomListGroupItemRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\CreateCustomListGroupRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\GetCustomListGroupItemsRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\GetCustomListGroupsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ListGroupResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListRuleForCreate|array<string, mixed>  $listRule
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\CreateCustomListGroupRequest
     */
    public function createCustom(GlobalListRuleForCreate|array $listRule): Created
    {
        return $this->fetch(new CreateCustomListGroupRequest(listRule: $listRule));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\CreateCustomListGroupItemRequest
     */
    public function createItem(string $listType, GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateCustomListGroupItemRequest(listType: $listType, listItem: $listItem));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListGroup>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\GetCustomListGroupsRequest
     */
    public function getCustom(): Collection
    {
        return $this->fetch(new GetCustomListGroupsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\GetCustomListGroupItemsRequest
     */
    public function getItems(string $listType): Collection
    {
        return $this->fetch(new GetCustomListGroupItemsRequest(listType: $listType));
    }
}
