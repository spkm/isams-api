<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\StudentCustomFields;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\CustomField;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves custom fields associated with an student by custom field ID.
 *
 * GET /api/admissions/applicants/student/{schoolId}/customFields/{customFieldId}
 */
#[Beta]
class GetApplicantStudentCustomFieldRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = CustomField::class;

    public function __construct(
        protected string $schoolId,
        protected int $customFieldId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/student/'.rawurlencode((string) $this->schoolId).'/customFields/'.rawurlencode((string) $this->customFieldId);
    }
}
