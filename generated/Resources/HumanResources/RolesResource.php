<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\RoleForCreate;
use spkm\IsamsApi\Data\HumanResources\RoleForUpdate;
use spkm\IsamsApi\Requests\HumanResources\Roles\CreateRoleRequest;
use spkm\IsamsApi\Requests\HumanResources\Roles\GetRoleRequest;
use spkm\IsamsApi\Requests\HumanResources\Roles\GetRolesRequest;
use spkm\IsamsApi\Requests\HumanResources\Roles\UpdateRoleRequest;

class RolesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetRolesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\RoleForCreate|array<string, mixed>  $role
     */
    public function create(RoleForCreate|array $role): Response
    {
        return $this->connector->send(new CreateRoleRequest($role));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetRoleRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\RoleForUpdate|array<string, mixed>  $role
     */
    public function update(int $id, RoleForUpdate|array $role): Response
    {
        return $this->connector->send(new UpdateRoleRequest($id, $role));
    }
}
