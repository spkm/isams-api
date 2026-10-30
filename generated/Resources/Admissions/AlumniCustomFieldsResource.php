<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\Admissions\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\GetApplicantAlumniCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\GetApplicantAlumniCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\PatchApplicantAlumniCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\PatchApplicantAlumniCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AlumniCustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\CustomField>
     * @see \spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\GetApplicantAlumniCustomFieldsRequest
     */
    public function all(string $schoolId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetApplicantAlumniCustomFieldsRequest(schoolId: $schoolId, filter: $filter));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\CustomField>
     * @see \spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\GetApplicantAlumniCustomFieldRequest
     */
    public function get(string $schoolId, int $customFieldId): Collection
    {
        return $this->fetch(new GetApplicantAlumniCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>  $customField
     * @see \spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\PatchApplicantAlumniCustomFieldRequest
     */
    public function patch(string $schoolId, int $customFieldId, CustomFieldForPatch|array $customField): bool
    {
        $this->fetch(new PatchApplicantAlumniCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId, customField: $customField));

        return true;
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\PatchApplicantAlumniCustomFieldsRequest
     */
    public function patchMany(string $schoolId, array $customFields): bool
    {
        $this->fetch(new PatchApplicantAlumniCustomFieldsRequest(schoolId: $schoolId, customFields: $customFields));

        return true;
    }
}
