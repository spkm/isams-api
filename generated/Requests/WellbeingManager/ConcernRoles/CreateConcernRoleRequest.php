<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernRoles;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernRoleForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a concern role.
 *
 * POST /api/wellbeing/concernroles
 */
class CreateConcernRoleRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernRoleForCreate|array<string, mixed>  $concernRole
     */
    public function __construct(
        protected ConcernRoleForCreate|array $concernRole,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernroles';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concernRole instanceof Data ? $this->concernRole->toArray() : $this->concernRole;
    }
}
