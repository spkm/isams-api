<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Roles;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\RoleForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a role.
 *
 * POST /api/humanresources/roles
 */
class CreateRoleRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\RoleForCreate|array<string, mixed>  $role
     */
    public function __construct(
        protected RoleForCreate|array $role,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/roles';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->role instanceof Data ? $this->role->toArray() : $this->role;
    }
}
