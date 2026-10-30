<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Admissions\PassportCustomFields\GetApplicantPassportCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\PassportCustomFields\GetApplicantPassportCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\PassportCustomFields\PatchApplicantPassportCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PassportCustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\CustomField>
     * @see \spkm\IsamsApi\Requests\Admissions\PassportCustomFields\GetApplicantPassportCustomFieldsRequest
     */
    public function all(string $schoolId, int $passportId): Collection
    {
        return $this->fetch(new GetApplicantPassportCustomFieldsRequest(schoolId: $schoolId, passportId: $passportId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\CustomField>
     * @see \spkm\IsamsApi\Requests\Admissions\PassportCustomFields\GetApplicantPassportCustomFieldRequest
     */
    public function get(string $schoolId, int $passportId, int $customFieldId): Collection
    {
        return $this->fetch(new GetApplicantPassportCustomFieldRequest(schoolId: $schoolId, passportId: $passportId, customFieldId: $customFieldId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\Admissions\PassportCustomFields\PatchApplicantPassportCustomFieldsRequest
     */
    public function patchMany(string $schoolId, int $passportId, array $customFields): bool
    {
        $this->fetch(new PatchApplicantPassportCustomFieldsRequest(schoolId: $schoolId, passportId: $passportId, customFields: $customFields));

        return true;
    }
}
