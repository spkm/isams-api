<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the unique identifier of the default visibility group.
 *
 * GET /api/wellbeing/visibilitygroups/default
 */
class GetDefaultVisibilityGroupRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/visibilitygroups/default';
    }
}
