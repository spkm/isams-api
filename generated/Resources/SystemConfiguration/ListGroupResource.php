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
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListRuleForCreate|array<string, mixed>  $listRule
     */
    public function createCustom(GlobalListRuleForCreate|array $listRule): Response
    {
        return $this->connector->send(new CreateCustomListGroupRequest($listRule));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function createItem(string $listType, GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateCustomListGroupItemRequest($listType, $listItem));
    }

    public function getCustom(): Response
    {
        return $this->connector->send(new GetCustomListGroupsRequest());
    }

    public function getItems(string $listType): Response
    {
        return $this->connector->send(new GetCustomListGroupItemsRequest($listType));
    }
}
