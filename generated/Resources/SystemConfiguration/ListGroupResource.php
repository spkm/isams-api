<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListRuleForCreate;
use spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\CreateCustomListGroupItemRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\CreateCustomListGroupRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\GetCustomListGroupItemsRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\GetCustomListGroupsRequest;

class ListGroupResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListRuleForCreate|array<string, mixed>  $globalListGroup
     */
    public function createCustomListGroup(GlobalListRuleForCreate|array $globalListGroup): Response
    {
        return $this->connector->send(new CreateCustomListGroupRequest($globalListGroup));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createCustomListGroupItem(
        string $listType,
        GlobalListItemForCreate|array $globalListItem,
    ): Response {
        return $this->connector->send(new CreateCustomListGroupItemRequest($listType, $globalListItem));
    }

    public function getCustomListGroupItems(string $listType): Response
    {
        return $this->connector->send(new GetCustomListGroupItemsRequest($listType));
    }

    public function getCustomListGroups(): Response
    {
        return $this->connector->send(new GetCustomListGroupsRequest());
    }
}
