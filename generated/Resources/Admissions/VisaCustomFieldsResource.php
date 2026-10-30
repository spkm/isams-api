<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Admissions\VisaCustomFields\GetApplicantVisaCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\VisaCustomFields\GetApplicantVisaCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\VisaCustomFields\PatchApplicantVisaCustomFieldsRequest;

class VisaCustomFieldsResource extends BaseResource
{
    public function all(string $schoolId, int $visaId): Response
    {
        return $this->connector->send(new GetApplicantVisaCustomFieldsRequest($schoolId, $visaId));
    }

    public function get(string $schoolId, int $visaId, int $customFieldId): Response
    {
        return $this->connector->send(new GetApplicantVisaCustomFieldRequest($schoolId, $visaId, $customFieldId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchMany(string $schoolId, int $visaId, array $customFields): Response
    {
        return $this->connector->send(new PatchApplicantVisaCustomFieldsRequest($schoolId, $visaId, $customFields));
    }
}
