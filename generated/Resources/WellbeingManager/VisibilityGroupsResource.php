<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetDefaultVisibilityGroupRequest;
use spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetVisibilityGroupRequest;
use spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetVisibilityGroupUsersRequest;
use spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetVisibilityGroupsRequest;

class VisibilityGroupsResource extends BaseResource
{
    public function getDefaultVisibilityGroup(): Response
    {
        return $this->connector->send(new GetDefaultVisibilityGroupRequest());
    }

    public function getVisibilityGroup(int $id): Response
    {
        return $this->connector->send(new GetVisibilityGroupRequest($id));
    }

    public function getVisibilityGroupUsers(int $groupId): Response
    {
        return $this->connector->send(new GetVisibilityGroupUsersRequest($groupId));
    }

    public function getVisibilityGroups(): Response
    {
        return $this->connector->send(new GetVisibilityGroupsRequest());
    }
}
