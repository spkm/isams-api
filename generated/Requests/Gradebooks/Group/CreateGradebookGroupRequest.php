<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\Group;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\GroupStructureForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Create a group.
 *
 * POST /api/gradebooks/{gradebookId}/structure/groups
 */
#[Beta]
class CreateGradebookGroupRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\GroupStructureForCreate|array<string, mixed>  $groupStructure
     */
    public function __construct(
        protected int $gradebookId,
        protected GroupStructureForCreate|array $groupStructure,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/groups';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->groupStructure instanceof Data ? $this->groupStructure->toArray() : $this->groupStructure;
    }
}
