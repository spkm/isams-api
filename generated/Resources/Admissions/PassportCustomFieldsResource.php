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
    public function all(string $schoolId, int $passportId): Response
    {
        return $this->connector->send(new GetApplicantPassportCustomFieldsRequest($schoolId, $passportId));
    }

    public function get(string $schoolId, int $passportId, int $customFieldId): Response
    {
        return $this->connector->send(new GetApplicantPassportCustomFieldRequest($schoolId, $passportId, $customFieldId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchMany(string $schoolId, int $passportId, array $customFields): Response
    {
        return $this->connector->send(new PatchApplicantPassportCustomFieldsRequest($schoolId, $passportId, $customFields));
    }
}
