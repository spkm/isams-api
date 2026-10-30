<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\Students\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Students\CustomFields\GetStudentCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\GetStudentCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\PatchStudentCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\PatchStudentCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomField>
     * @see \spkm\IsamsApi\Requests\Students\CustomFields\GetStudentCustomFieldsRequest
     */
    public function all(string $schoolId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetStudentCustomFieldsRequest(schoolId: $schoolId, filter: $filter));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomField>
     * @see \spkm\IsamsApi\Requests\Students\CustomFields\GetStudentCustomFieldRequest
     */
    public function get(string $schoolId, int $customFieldId): Collection
    {
        return $this->fetch(new GetStudentCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>  $customField
     * @see \spkm\IsamsApi\Requests\Students\CustomFields\PatchStudentCustomFieldRequest
     */
    public function patch(string $schoolId, int $customFieldId, CustomFieldForPatch|array $customField): bool
    {
        $this->fetch(new PatchStudentCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId, customField: $customField));

        return true;
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\Students\CustomFields\PatchStudentCustomFieldsRequest
     */
    public function patchMany(string $schoolId, array $customFields): bool
    {
        $this->fetch(new PatchStudentCustomFieldsRequest(schoolId: $schoolId, customFields: $customFields));

        return true;
    }
}
