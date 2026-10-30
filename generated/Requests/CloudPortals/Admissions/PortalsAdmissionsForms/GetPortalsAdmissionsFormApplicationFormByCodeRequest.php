<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves requested form. if no form is specified default form will attempt to be found
 *
 * GET /api/portals/admissions/forms/application/{code}
 */
class GetPortalsAdmissionsFormApplicationFormByCodeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected int $code,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/forms/application/'.rawurlencode((string) $this->code);
    }
}
