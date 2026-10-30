<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\VisaCustomFields;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\CustomField;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all custom fields associated with an applicant visa.
 *
 * GET /api/admissions/applicants/{schoolId}/customfields/visa/{visaId}
 */
#[Beta]
class GetApplicantVisaCustomFieldsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = CustomField::class;
    public string $resultKey = 'customFields';

    public function __construct(
        protected string $schoolId,
        protected int $visaId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/customfields/visa/'.rawurlencode((string) $this->visaId);
    }
}
