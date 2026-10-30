<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Admissions\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Admissions\StudentCustomFields\GetApplicantStudentCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\StudentCustomFields\GetApplicantStudentCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\StudentCustomFields\PatchApplicantStudentCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\StudentCustomFields\PatchApplicantStudentCustomFieldsRequest;

class StudentCustomFieldsResource extends BaseResource
{
    public function getApplicantStudentCustomField(string $schoolId, int $customFieldId): Response
    {
        return $this->connector->send(new GetApplicantStudentCustomFieldRequest($schoolId, $customFieldId));
    }

    public function getApplicantStudentCustomFields(string $schoolId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetApplicantStudentCustomFieldsRequest($schoolId, $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>  $customField
     */
    public function patchApplicantStudentCustomField(
        string $schoolId,
        int $customFieldId,
        CustomFieldForPatch|array $customField,
    ): Response {
        return $this->connector->send(new PatchApplicantStudentCustomFieldRequest($schoolId, $customFieldId, $customField));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchApplicantStudentCustomFields(string $schoolId, array $customFields): Response
    {
        return $this->connector->send(new PatchApplicantStudentCustomFieldsRequest($schoolId, $customFields));
    }
}
