<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\CreateAdmissionsStatusRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\DeleteAdmissionsStatusRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\GetAdmissionsStatusesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\UpdateAdmissionsStatusRequest;

class AdmissionsStatusResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAdmissionsStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateAdmissionsStatusRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteAdmissionsStatusRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateAdmissionsStatusRequest($id, $listItem));
    }
}
