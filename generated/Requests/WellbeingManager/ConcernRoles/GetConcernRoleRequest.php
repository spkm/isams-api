<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernRole;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a Concern Role.
 *
 * GET /api/wellbeing/concernroles/{id}
 */
class GetConcernRoleRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ConcernRole::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernroles/'.rawurlencode((string) $this->id);
    }
}
