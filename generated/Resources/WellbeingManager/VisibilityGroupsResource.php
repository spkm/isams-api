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
    public function all(): Response
    {
        return $this->connector->send(new GetVisibilityGroupsRequest());
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetVisibilityGroupRequest($id));
    }

    public function getDefault(): Response
    {
        return $this->connector->send(new GetDefaultVisibilityGroupRequest());
    }

    public function getUsers(int $groupId): Response
    {
        return $this->connector->send(new GetVisibilityGroupUsersRequest($groupId));
    }
}
