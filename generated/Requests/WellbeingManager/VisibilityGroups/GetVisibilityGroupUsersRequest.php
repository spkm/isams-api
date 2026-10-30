<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\VisibilityGroupUser;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all visibility group users associated with a visibility group.
 *
 * GET /api/wellbeing/visibilitygroups/{groupId}/users
 */
class GetVisibilityGroupUsersRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = VisibilityGroupUser::class;
    public string $resultKey = 'users';

    public function __construct(
        protected int $groupId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/visibilitygroups/'.rawurlencode((string) $this->groupId).'/users';
    }
}
