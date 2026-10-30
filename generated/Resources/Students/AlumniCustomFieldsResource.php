<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\Students\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Students\AlumniCustomFields\GetAlumniCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\AlumniCustomFields\GetAlumniCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\AlumniCustomFields\PatchAlumniCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\AlumniCustomFields\PatchAlumniCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AlumniCustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomField>
     * @see \spkm\IsamsApi\Requests\Students\AlumniCustomFields\GetAlumniCustomFieldsRequest
     */
    public function all(string $schoolId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetAlumniCustomFieldsRequest(schoolId: $schoolId, filter: $filter));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomField>
     * @see \spkm\IsamsApi\Requests\Students\AlumniCustomFields\GetAlumniCustomFieldRequest
     */
    public function get(string $schoolId, int $customFieldId): Collection
    {
        return $this->fetch(new GetAlumniCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>  $customField
     * @see \spkm\IsamsApi\Requests\Students\AlumniCustomFields\PatchAlumniCustomFieldRequest
     */
    public function patch(string $schoolId, int $customFieldId, CustomFieldForPatch|array $customField): void
    {
        $this->fetch(new PatchAlumniCustomFieldRequest(schoolId: $schoolId, customFieldId: $customFieldId, customField: $customField));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\Students\AlumniCustomFields\PatchAlumniCustomFieldsRequest
     */
    public function patchMany(string $schoolId, array $customFields): void
    {
        $this->fetch(new PatchAlumniCustomFieldsRequest(schoolId: $schoolId, customFields: $customFields));
    }
}
