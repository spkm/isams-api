<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\EnquiryReasons;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes an enquiry reason.
 *
 * DELETE /api/admissions/enquiryreasons/{id}
 */
class DeleteEnquiryReasonRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/enquiryreasons/'.rawurlencode((string) $this->id);
    }
}
