<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Students\PassportCustomFields\GetStudentPassportCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\PassportCustomFields\GetStudentPassportCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\PassportCustomFields\PatchStudentPassportCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PassportCustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomField>
     * @see \spkm\IsamsApi\Requests\Students\PassportCustomFields\GetStudentPassportCustomFieldsRequest
     */
    public function all(string $schoolId, int $passportId): Collection
    {
        return $this->fetch(new GetStudentPassportCustomFieldsRequest(schoolId: $schoolId, passportId: $passportId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomField>
     * @see \spkm\IsamsApi\Requests\Students\PassportCustomFields\GetStudentPassportCustomFieldRequest
     */
    public function get(string $schoolId, int $passportId, int $customFieldId): Collection
    {
        return $this->fetch(new GetStudentPassportCustomFieldRequest(schoolId: $schoolId, passportId: $passportId, customFieldId: $customFieldId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\Students\PassportCustomFields\PatchStudentPassportCustomFieldsRequest
     */
    public function patchMany(string $schoolId, int $passportId, array $customFields): bool
    {
        $this->fetch(new PatchStudentPassportCustomFieldsRequest(schoolId: $schoolId, passportId: $passportId, customFields: $customFields));

        return true;
    }
}
