<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Students\VisaCustomFields\GetStudentVisaCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\VisaCustomFields\GetStudentVisaCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\VisaCustomFields\PatchStudentVisaCustomFieldsRequest;

class VisaCustomFieldsResource extends BaseResource
{
    public function all(string $schoolId, int $visaId): Response
    {
        return $this->connector->send(new GetStudentVisaCustomFieldsRequest($schoolId, $visaId));
    }

    public function get(string $schoolId, int $visaId, int $customFieldId): Response
    {
        return $this->connector->send(new GetStudentVisaCustomFieldRequest($schoolId, $visaId, $customFieldId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchMany(string $schoolId, int $visaId, array $customFields): Response
    {
        return $this->connector->send(new PatchStudentVisaCustomFieldsRequest($schoolId, $visaId, $customFields));
    }
}
