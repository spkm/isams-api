<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\LeavingReasons\CreateLeavingReasonRequest;
use spkm\IsamsApi\Requests\HumanResources\LeavingReasons\DeleteLeavingReasonRequest;
use spkm\IsamsApi\Requests\HumanResources\LeavingReasons\GetLeavingReasonsRequest;
use spkm\IsamsApi\Requests\HumanResources\LeavingReasons\UpdateLeavingReasonRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class LeavingReasonsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\HumanResources\LeavingReasons\GetLeavingReasonsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetLeavingReasonsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\LeavingReasons\CreateLeavingReasonRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateLeavingReasonRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\LeavingReasons\DeleteLeavingReasonRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteLeavingReasonRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\LeavingReasons\UpdateLeavingReasonRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateLeavingReasonRequest(id: $id, listItem: $listItem));
    }
}
