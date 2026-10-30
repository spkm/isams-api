<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\EnquiryTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes an enquiry type.
 *
 * DELETE /api/admissions/enquirytypes/{id}
 */
class DeleteEnquiryTypeRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/enquirytypes/'.rawurlencode((string) $this->id);
    }
}
