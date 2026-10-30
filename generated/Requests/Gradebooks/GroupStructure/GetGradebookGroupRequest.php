<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\GroupStructure;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\GroupStructure;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve a group.
 *
 * GET /api/gradebooks/{gradebookId}/structure/groups/{groupId}
 */
#[Beta]
class GetGradebookGroupRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = GroupStructure::class;

    public function __construct(
        protected int $gradebookId,
        protected int $groupId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/groups/'.rawurlencode((string) $this->groupId);
    }
}
