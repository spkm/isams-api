<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\CreateAdmissionsStatusRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\DeleteAdmissionsStatusRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\GetAdmissionsStatusesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\UpdateAdmissionsStatusRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AdmissionsStatusResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\GetAdmissionsStatusesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetAdmissionsStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\CreateAdmissionsStatusRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateAdmissionsStatusRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\DeleteAdmissionsStatusRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteAdmissionsStatusRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\UpdateAdmissionsStatusRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateAdmissionsStatusRequest(id: $id, listItem: $listItem));
    }
}
