<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\Admissions\CustomField;
use spkm\IsamsApi\Data\Admissions\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Admissions\CustomFields\GetApplicantCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\CustomFields\GetApplicantCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\CustomFields\PatchApplicantCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\CustomFields\PatchApplicantCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\CustomField>
     * @see \spkm\IsamsApi\Requests\Admissions\CustomFields\GetApplicantCustomFieldsRequest
     */
    public function all(string $schoolId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetApplicantCustomFieldsRequest(schoolId: $schoolId, filter: $filter));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\CustomFields\GetApplicantCustomFieldRequest
     */
    public function get(string $schoolId, int $customFieldId): CustomField
    {
        return $this->fetch(new GetApplicantCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>  $customField
     * @see \spkm\IsamsApi\Requests\Admissions\CustomFields\PatchApplicantCustomFieldRequest
     */
    public function patch(string $schoolId, int $customFieldId, CustomFieldForPatch|array $customField): void
    {
        $this->fetch(new PatchApplicantCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId, customField: $customField));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\Admissions\CustomFields\PatchApplicantCustomFieldsRequest
     */
    public function patchMany(string $schoolId, array $customFields): void
    {
        $this->fetch(new PatchApplicantCustomFieldsRequest(schoolId: $schoolId, customFields: $customFields));
    }
}
