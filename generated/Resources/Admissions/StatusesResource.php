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
    public function all(): Response
    {
        return $this->connector->send(new GetStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateStatusRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteStatusRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateStatusRequest($id, $listItem));
    }
}
