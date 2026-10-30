<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\WellbeingManager\ConcernRole;
use spkm\IsamsApi\Data\WellbeingManager\ConcernRoleForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\CreateConcernRoleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\DeleteConcernRoleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\GetConcernRoleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\GetConcernRolesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\PatchConcernRoleRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernRolesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\WellbeingManager\ConcernRole>
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\GetConcernRolesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetConcernRolesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernRoleForCreate|array<string, mixed>  $concernRole
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\CreateConcernRoleRequest
     */
    public function create(ConcernRoleForCreate|array $concernRole): Created
    {
        return $this->fetch(new CreateConcernRoleRequest(concernRole: $concernRole));
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\DeleteConcernRoleRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteConcernRoleRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\GetConcernRoleRequest
     */
    public function get(int $id): ConcernRole
    {
        return $this->fetch(new GetConcernRoleRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\PatchConcernRoleRequest
     */
    public function patch(int $id, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchConcernRoleRequest(id: $id, patch: $patch));

        return true;
    }
}
