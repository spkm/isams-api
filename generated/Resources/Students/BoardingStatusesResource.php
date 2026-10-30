<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Students\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Students\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\Students\BoardingStatuses\CreateBoardingStatusRequest;
use spkm\IsamsApi\Requests\Students\BoardingStatuses\DeleteBoardingStatusRequest;
use spkm\IsamsApi\Requests\Students\BoardingStatuses\GetBoardingStatusesRequest;
use spkm\IsamsApi\Requests\Students\BoardingStatuses\UpdateBoardingStatusRequest;

class BoardingStatusesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Students\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createBoardingStatus(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateBoardingStatusRequest($globalListItem));
    }

    public function deleteBoardingStatus(int $id): Response
    {
        return $this->connector->send(new DeleteBoardingStatusRequest($id));
    }

    public function getBoardingStatuses(): Response
    {
        return $this->connector->send(new GetBoardingStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateBoardingStatus(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateBoardingStatusRequest($id, $globalListItem));
    }
}
