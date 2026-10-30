<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\PassportCustomFields;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\CustomField;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all custom fields associated with an applicant passport.
 *
 * GET /api/admissions/applicants/{schoolId}/customfields/passport/{passportId}
 */
#[Beta]
class GetApplicantPassportCustomFieldsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = CustomField::class;
    public string $resultKey = 'customFields';

    public function __construct(
        protected string $schoolId,
        protected int $passportId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/customfields/passport/'.rawurlencode((string) $this->passportId);
    }
}
