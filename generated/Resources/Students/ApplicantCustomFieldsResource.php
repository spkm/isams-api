<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Students\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Students\ApplicantCustomFields\GetStudentApplicantCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\ApplicantCustomFields\GetStudentApplicantCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\ApplicantCustomFields\PatchStudentApplicantCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\ApplicantCustomFields\PatchStudentApplicantCustomFieldsRequest;

class ApplicantCustomFieldsResource extends BaseResource
{
    public function all(string $schoolId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetStudentApplicantCustomFieldsRequest($schoolId, $filter));
    }

    public function get(string $schoolId, int $customFieldId): Response
    {
        return $this->connector->send(new GetStudentApplicantCustomFieldRequest($schoolId, $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>  $customField
     */
    public function patch(string $schoolId, int $customFieldId, CustomFieldForPatch|array $customField): Response
    {
        return $this->connector->send(new PatchStudentApplicantCustomFieldRequest($schoolId, $customFieldId, $customField));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchMany(string $schoolId, array $customFields): Response
    {
        return $this->connector->send(new PatchStudentApplicantCustomFieldsRequest($schoolId, $customFields));
    }
}
