<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Admissions\PassportCustomFields\GetApplicantPassportCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\PassportCustomFields\GetApplicantPassportCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\PassportCustomFields\PatchApplicantPassportCustomFieldsRequest;

class PassportCustomFieldsResource extends BaseResource
{
    public function getApplicantPassportCustomField(string $schoolId, int $passportId, int $customFieldId): Response
    {
        return $this->connector->send(new GetApplicantPassportCustomFieldRequest($schoolId, $passportId, $customFieldId));
    }

    public function getApplicantPassportCustomFields(string $schoolId, int $passportId): Response
    {
        return $this->connector->send(new GetApplicantPassportCustomFieldsRequest($schoolId, $passportId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $listCustomField
     */
    public function patchApplicantPassportCustomFields(
        string $schoolId,
        int $passportId,
        array $listCustomField,
    ): Response {
        return $this->connector->send(new PatchApplicantPassportCustomFieldsRequest($schoolId, $passportId, $listCustomField));
    }
}
