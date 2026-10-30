<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\Admissions\VisaCustomFields\GetApplicantVisaCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\VisaCustomFields\GetApplicantVisaCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\VisaCustomFields\PatchApplicantVisaCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class VisaCustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\CustomField>
     * @see \spkm\IsamsApi\Requests\Admissions\VisaCustomFields\GetApplicantVisaCustomFieldsRequest
     */
    public function all(string $schoolId, int $visaId): Collection
    {
        return $this->fetch(new GetApplicantVisaCustomFieldsRequest(schoolId: $schoolId, visaId: $visaId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\CustomField>
     * @see \spkm\IsamsApi\Requests\Admissions\VisaCustomFields\GetApplicantVisaCustomFieldRequest
     */
    public function get(string $schoolId, int $visaId, int $customFieldId): Collection
    {
        return $this->fetch(new GetApplicantVisaCustomFieldRequest(schoolId: $schoolId, visaId: $visaId, customFieldId: $customFieldId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\Admissions\VisaCustomFields\PatchApplicantVisaCustomFieldsRequest
     */
    public function patchMany(string $schoolId, int $visaId, array $customFields): bool
    {
        $this->fetch(new PatchApplicantVisaCustomFieldsRequest(schoolId: $schoolId, visaId: $visaId, customFields: $customFields));

        return true;
    }
}
