<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\WellbeingManager\VisibilityGroup;
use spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetDefaultVisibilityGroupRequest;
use spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetVisibilityGroupRequest;
use spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetVisibilityGroupUsersRequest;
use spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetVisibilityGroupsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class VisibilityGroupsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetVisibilityGroupsRequest
     */
    public function all(): mixed
    {
        return $this->fetch(new GetVisibilityGroupsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetVisibilityGroupRequest
     */
    public function get(int $id): VisibilityGroup
    {
        return $this->fetch(new GetVisibilityGroupRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetDefaultVisibilityGroupRequest
     */
    public function getDefault(): mixed
    {
        return $this->fetch(new GetDefaultVisibilityGroupRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\VisibilityGroupUser>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetVisibilityGroupUsersRequest
     */
    public function getUsers(int $groupId): Collection
    {
        return $this->fetch(new GetVisibilityGroupUsersRequest(groupId: $groupId));
    }
}
