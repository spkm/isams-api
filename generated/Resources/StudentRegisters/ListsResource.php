<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\StudentRegisters\Lists\GetListItemsRequest;

class ListsResource extends BaseResource
{
    public function getListItems(int $listId): Response
    {
        return $this->connector->send(new GetListItemsRequest($listId));
    }
}
