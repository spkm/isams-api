<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all visibility groups.
 *
 * GET /api/wellbeing/visibilitygroups
 */
class GetVisibilityGroupsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/visibilitygroups';
    }
}
