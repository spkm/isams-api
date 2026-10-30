<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Roles;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\Role;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all roles.
 *
 * GET /api/humanresources/roles
 */
class GetRolesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Role::class;
    public string $resultKey = 'roles';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/roles';
    }
}
