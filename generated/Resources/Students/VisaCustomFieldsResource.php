<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Students\VisaCustomFields\GetStudentVisaCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\VisaCustomFields\GetStudentVisaCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\VisaCustomFields\PatchStudentVisaCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class VisaCustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomField>
     * @see \spkm\IsamsApi\Requests\Students\VisaCustomFields\GetStudentVisaCustomFieldsRequest
     */
    public function all(string $schoolId, int $visaId): Collection
    {
        return $this->fetch(new GetStudentVisaCustomFieldsRequest(schoolId: $schoolId, visaId: $visaId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomField>
     * @see \spkm\IsamsApi\Requests\Students\VisaCustomFields\GetStudentVisaCustomFieldRequest
     */
    public function get(string $schoolId, int $visaId, int $customFieldId): Collection
    {
        return $this->fetch(new GetStudentVisaCustomFieldRequest(schoolId: $schoolId, visaId: $visaId, customFieldId: $customFieldId));
    }

    /**
     * @param  array<int, \spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\Students\VisaCustomFields\PatchStudentVisaCustomFieldsRequest
     */
    public function patchMany(string $schoolId, int $visaId, array $customFields): bool
    {
        $this->fetch(new PatchStudentVisaCustomFieldsRequest(schoolId: $schoolId, visaId: $visaId, customFields: $customFields));

        return true;
    }
}
