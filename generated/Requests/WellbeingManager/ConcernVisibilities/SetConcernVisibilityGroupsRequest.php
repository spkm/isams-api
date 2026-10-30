<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityGroupsForPatch;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Sets the user's visibility groups for a concern.
 *
 * PATCH /api/wellbeing/students/{schoolId}/concerns/{concernId}/visibilitygroups
 */
class SetConcernVisibilityGroupsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityGroupsForPatch|array<string, mixed>  $visibilityGroups
     */
    public function __construct(
        protected string $schoolId,
        protected int $concernId,
        protected ConcernVisibilityGroupsForPatch|array $visibilityGroups,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/visibilitygroups';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->visibilityGroups instanceof Data ? $this->visibilityGroups->toArray() : $this->visibilityGroups;
    }
}
