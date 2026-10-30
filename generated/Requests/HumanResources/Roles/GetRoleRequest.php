<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Roles;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\Role;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a role.
 *
 * GET /api/humanresources/roles/{id}
 */
class GetRoleRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Role::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/roles/'.rawurlencode((string) $this->id);
    }
}
