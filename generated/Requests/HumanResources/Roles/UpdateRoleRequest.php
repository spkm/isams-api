<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Roles;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\RoleForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a role.
 *
 * PUT /api/humanresources/roles/{id}
 */
class UpdateRoleRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\RoleForUpdate|array<string, mixed>  $role
     */
    public function __construct(
        protected int $id,
        protected RoleForUpdate|array $role,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/roles/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->role instanceof Data ? $this->role->toArray() : $this->role;
    }
}
