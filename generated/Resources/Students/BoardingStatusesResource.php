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
    public function all(): Response
    {
        return $this->connector->send(new GetBoardingStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateBoardingStatusRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteBoardingStatusRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateBoardingStatusRequest($id, $listItem));
    }
}
