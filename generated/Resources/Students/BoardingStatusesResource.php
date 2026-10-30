<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Students\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Students\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\Students\BoardingStatuses\CreateBoardingStatusRequest;
use spkm\IsamsApi\Requests\Students\BoardingStatuses\DeleteBoardingStatusRequest;
use spkm\IsamsApi\Requests\Students\BoardingStatuses\GetBoardingStatusesRequest;
use spkm\IsamsApi\Requests\Students\BoardingStatuses\UpdateBoardingStatusRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class BoardingStatusesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\Students\BoardingStatuses\GetBoardingStatusesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetBoardingStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\Students\BoardingStatuses\CreateBoardingStatusRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateBoardingStatusRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\BoardingStatuses\DeleteBoardingStatusRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteBoardingStatusRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\Students\BoardingStatuses\UpdateBoardingStatusRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateBoardingStatusRequest(id: $id, listItem: $listItem));

        return true;
    }
}
