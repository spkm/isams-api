<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves requested form. if no form is specified default form will attempt to be found
 *
 * GET /api/portals/admissions/forms/enquiry
 */
class GetAdmissionsFormDefaultEnquiryFormRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/forms/enquiry';
    }
}
