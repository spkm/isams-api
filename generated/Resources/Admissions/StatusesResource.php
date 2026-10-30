<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Admissions\Statuses\CreateStatusRequest;
use spkm\IsamsApi\Requests\Admissions\Statuses\DeleteStatusRequest;
use spkm\IsamsApi\Requests\Admissions\Statuses\GetStatusesRequest;
use spkm\IsamsApi\Requests\Admissions\Statuses\UpdateStatusRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StatusesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\Admissions\Statuses\GetStatusesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\Admissions\Statuses\CreateStatusRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateStatusRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\Statuses\DeleteStatusRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteStatusRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\Admissions\Statuses\UpdateStatusRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateStatusRequest(id: $id, listItem: $listItem));

        return true;
    }
}
