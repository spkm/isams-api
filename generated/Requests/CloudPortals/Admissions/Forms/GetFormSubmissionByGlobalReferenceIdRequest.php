<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/admissions/forms/submission/globalreference/{formSubmissionGlobalId}
 */
class GetFormSubmissionByGlobalReferenceIdRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::RAW;

    public function __construct(
        protected string $formSubmissionGlobalId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/forms/submission/globalreference/'.rawurlencode((string) $this->formSubmissionGlobalId);
    }
}
