<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\FormInstance;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/admissions/forminstance/applicationForms
 */
class GetFormInstanceApplicationFormListRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/forminstance/applicationForms';
    }
}
