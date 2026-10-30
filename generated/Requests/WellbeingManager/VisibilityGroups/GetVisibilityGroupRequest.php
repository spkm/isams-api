<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\VisibilityGroup;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a visibility group.
 *
 * GET /api/wellbeing/visibilitygroups/{id}
 */
class GetVisibilityGroupRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = VisibilityGroup::class;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/visibilitygroups/'.rawurlencode((string) $this->id);
    }
}
