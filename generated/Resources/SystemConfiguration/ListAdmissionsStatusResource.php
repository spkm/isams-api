<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\CreateAdmissionsStatusRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\DeleteAdmissionsStatusRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\GetAdmissionsStatusesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\AdmissionsStatus\UpdateAdmissionsStatusRequest;

class ListAdmissionsStatusResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createAdmissionsStatus(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateAdmissionsStatusRequest($globalListItem));
    }

    public function deleteAdmissionsStatus(int $id): Response
    {
        return $this->connector->send(new DeleteAdmissionsStatusRequest($id));
    }

    public function getAdmissionsStatuses(): Response
    {
        return $this->connector->send(new GetAdmissionsStatusesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateAdmissionsStatus(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateAdmissionsStatusRequest($id, $globalListItem));
    }
}
