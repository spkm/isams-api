<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\WellbeingManager;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\WellbeingManager\ConcernRoleForCreate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\CreateConcernRoleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\DeleteConcernRoleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\GetConcernRoleRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\GetConcernRolesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles\PatchConcernRoleRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ConcernRolesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetConcernRolesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernRoleForCreate|array<string, mixed>  $concernRole
     */
    public function create(ConcernRoleForCreate|array $concernRole): Response
    {
        return $this->connector->send(new CreateConcernRoleRequest($concernRole));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteConcernRoleRequest($id));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetConcernRoleRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchConcernRoleRequest($id, $patch));
    }
}
