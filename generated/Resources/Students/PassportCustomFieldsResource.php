<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Students\PassportCustomFields\GetStudentPassportCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\PassportCustomFields\GetStudentPassportCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\PassportCustomFields\PatchStudentPassportCustomFieldsRequest;

class PassportCustomFieldsResource extends BaseResource
{
    public function all(string $schoolId, int $passportId): Response
    {
        return $this->connector->send(new GetStudentPassportCustomFieldsRequest($schoolId, $passportId));
    }

    public function get(string $schoolId, int $passportId, int $customFieldId): Response
    {
        return $this->connector->send(new GetStudentPassportCustomFieldRequest($schoolId, $passportId, $customFieldId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchMany(string $schoolId, int $passportId, array $customFields): Response
    {
        return $this->connector->send(new PatchStudentPassportCustomFieldsRequest($schoolId, $passportId, $customFields));
    }
}
