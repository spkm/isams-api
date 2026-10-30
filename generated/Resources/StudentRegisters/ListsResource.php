<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\StudentRegisters\Lists\GetListItemsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ListsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\StudentRegisters\ListItem>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\Lists\GetListItemsRequest
     */
    public function getItems(int $listId): Collection
    {
        return $this->fetch(new GetListItemsRequest(listId: $listId));
    }
}
