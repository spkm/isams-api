<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernRole;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all concern roles.
 *
 * GET /api/wellbeing/concernroles
 */
class GetConcernRolesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConcernRole::class;
    public string $resultKey = 'roles';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernroles';
    }
}
