<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\Admissions\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Admissions\StudentCustomFields\GetApplicantStudentCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\StudentCustomFields\GetApplicantStudentCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\StudentCustomFields\PatchApplicantStudentCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\StudentCustomFields\PatchApplicantStudentCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StudentCustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\CustomField>
     * @see \spkm\IsamsApi\Requests\Admissions\StudentCustomFields\GetApplicantStudentCustomFieldsRequest
     */
    public function all(string $schoolId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetApplicantStudentCustomFieldsRequest(schoolId: $schoolId, filter: $filter));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\CustomField>
     * @see \spkm\IsamsApi\Requests\Admissions\StudentCustomFields\GetApplicantStudentCustomFieldRequest
     */
    public function get(string $schoolId, int $customFieldId): Collection
    {
        return $this->fetch(new GetApplicantStudentCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>  $customField
     * @see \spkm\IsamsApi\Requests\Admissions\StudentCustomFields\PatchApplicantStudentCustomFieldRequest
     */
    public function patch(string $schoolId, int $customFieldId, CustomFieldForPatch|array $customField): bool
    {
        $this->fetch(new PatchApplicantStudentCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId, customField: $customField));

        return true;
    }

    /**
     * @param  array<int, \spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\Admissions\StudentCustomFields\PatchApplicantStudentCustomFieldsRequest
     */
    public function patchMany(string $schoolId, array $customFields): bool
    {
        $this->fetch(new PatchApplicantStudentCustomFieldsRequest(schoolId: $schoolId, customFields: $customFields));

        return true;
    }
}
