<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Admissions\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\GetApplicantAlumniCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\GetApplicantAlumniCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\PatchApplicantAlumniCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\AlumniCustomFields\PatchApplicantAlumniCustomFieldsRequest;

class AlumniCustomFieldsResource extends BaseResource
{
    public function getApplicantAlumniCustomField(string $schoolId, int $customFieldId): Response
    {
        return $this->connector->send(new GetApplicantAlumniCustomFieldRequest($schoolId, $customFieldId));
    }

    public function getApplicantAlumniCustomFields(string $schoolId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetApplicantAlumniCustomFieldsRequest($schoolId, $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>  $customField
     */
    public function patchApplicantAlumniCustomField(
        string $schoolId,
        int $customFieldId,
        CustomFieldForPatch|array $customField,
    ): Response {
        return $this->connector->send(new PatchApplicantAlumniCustomFieldRequest($schoolId, $customFieldId, $customField));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchApplicantAlumniCustomFields(string $schoolId, array $customFields): Response
    {
        return $this->connector->send(new PatchApplicantAlumniCustomFieldsRequest($schoolId, $customFields));
    }
}
