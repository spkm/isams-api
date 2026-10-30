<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\Admissions\Statuses\CreateStatusRequest;
use spkm\IsamsApi\Requests\Admissions\Statuses\DeleteStatusRequest;
use spkm\IsamsApi\Requests\Admissions\Statuses\GetStatusesRequest;
use spkm\IsamsApi\Requests\Admissions\Statuses\UpdateStatusRequest;

class StatusesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createStatus(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateStatusRequest($globalListItem));
    }

    public function deleteStatus(int $id): Response
    {
        return $this->connector->send(new DeleteStatusRequest($id));
    }

    public function getStatuses(): Response
    {
        return $this->connector->send(new GetStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateStatus(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateStatusRequest($id, $globalListItem));
    }
}
