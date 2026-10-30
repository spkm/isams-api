<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\Students\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Students\ApplicantCustomFields\GetStudentApplicantCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\ApplicantCustomFields\GetStudentApplicantCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\ApplicantCustomFields\PatchStudentApplicantCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\ApplicantCustomFields\PatchStudentApplicantCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ApplicantCustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomField>
     * @see \spkm\IsamsApi\Requests\Students\ApplicantCustomFields\GetStudentApplicantCustomFieldsRequest
     */
    public function all(string $schoolId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetStudentApplicantCustomFieldsRequest(schoolId: $schoolId, filter: $filter));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomField>
     * @see \spkm\IsamsApi\Requests\Students\ApplicantCustomFields\GetStudentApplicantCustomFieldRequest
     */
    public function get(string $schoolId, int $customFieldId): Collection
    {
        return $this->fetch(new GetStudentApplicantCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>  $customField
     * @see \spkm\IsamsApi\Requests\Students\ApplicantCustomFields\PatchStudentApplicantCustomFieldRequest
     */
    public function patch(string $schoolId, int $customFieldId, CustomFieldForPatch|array $customField): bool
    {
        $this->fetch(new PatchStudentApplicantCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId, customField: $customField));

        return true;
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\Students\ApplicantCustomFields\PatchStudentApplicantCustomFieldsRequest
     */
    public function patchMany(string $schoolId, array $customFields): bool
    {
        $this->fetch(new PatchStudentApplicantCustomFieldsRequest(schoolId: $schoolId, customFields: $customFields));

        return true;
    }
}
