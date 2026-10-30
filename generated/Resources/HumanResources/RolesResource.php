<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\Role;
use spkm\IsamsApi\Data\HumanResources\RoleForCreate;
use spkm\IsamsApi\Data\HumanResources\RoleForUpdate;
use spkm\IsamsApi\Requests\HumanResources\Roles\CreateRoleRequest;
use spkm\IsamsApi\Requests\HumanResources\Roles\GetRoleRequest;
use spkm\IsamsApi\Requests\HumanResources\Roles\GetRolesRequest;
use spkm\IsamsApi\Requests\HumanResources\Roles\UpdateRoleRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class RolesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\Role>
     * @see \spkm\IsamsApi\Requests\HumanResources\Roles\GetRolesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetRolesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\RoleForCreate|array<string, mixed>  $role
     * @see \spkm\IsamsApi\Requests\HumanResources\Roles\CreateRoleRequest
     */
    public function create(RoleForCreate|array $role): Created
    {
        return $this->fetch(new CreateRoleRequest(role: $role));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\Roles\GetRoleRequest
     */
    public function get(int $id): Role
    {
        return $this->fetch(new GetRoleRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\RoleForUpdate|array<string, mixed>  $role
     * @see \spkm\IsamsApi\Requests\HumanResources\Roles\UpdateRoleRequest
     */
    public function update(int $id, RoleForUpdate|array $role): void
    {
        $this->fetch(new UpdateRoleRequest(id: $id, role: $role));
    }
}
