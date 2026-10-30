<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\AlumniCustomFields;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\CustomField;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves custom fields associated with an alumni by custom field ID.
 *
 * GET /api/admissions/applicants/alumni/{schoolId}/customFields/{customFieldId}
 */
#[Beta]
class GetApplicantAlumniCustomFieldRequest extends IsamsRequest
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
        return '/api/admissions/applicants/alumni/'.rawurlencode((string) $this->schoolId).'/customFields/'.rawurlencode((string) $this->customFieldId);
    }
}
