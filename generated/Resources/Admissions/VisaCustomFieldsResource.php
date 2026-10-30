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
    public function getApplicantVisaCustomField(string $schoolId, int $visaId, int $customFieldId): Response
    {
        return $this->connector->send(new GetApplicantVisaCustomFieldRequest($schoolId, $visaId, $customFieldId));
    }

    public function getApplicantVisaCustomFields(string $schoolId, int $visaId): Response
    {
        return $this->connector->send(new GetApplicantVisaCustomFieldsRequest($schoolId, $visaId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $listCustomField
     */
    public function patchApplicantVisaCustomFields(string $schoolId, int $visaId, array $listCustomField): Response
    {
        return $this->connector->send(new PatchApplicantVisaCustomFieldsRequest($schoolId, $visaId, $listCustomField));
    }
}
