<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\ApplicantCustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\CustomFieldForPatch;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates the value of a custom field associated with an applicant.
 *
 * PATCH /api/students/applicants/{schoolId}/customFields/{customFieldId}
 */
#[Beta]
class PatchStudentApplicantCustomFieldRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>  $customField
     */
    public function __construct(
        protected string $schoolId,
        protected int $customFieldId,
        protected CustomFieldForPatch|array $customField,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/applicants/'.rawurlencode((string) $this->schoolId).'/customFields/'.rawurlencode((string) $this->customFieldId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->customField instanceof Data ? $this->customField->toArray() : $this->customField;
    }
}
