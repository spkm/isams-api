<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Students\CustomFields\GetCustomFieldsBySchoolidAndCustomfieldidRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\GetCustomFieldsBySchoolidRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\PatchStudentCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest;

class CustomFieldsResource extends BaseResource
{
    public function getCustomFieldsBySchoolid(string $schoolId, mixed $filter = null): Response
    {
        return $this->connector->send(new GetCustomFieldsBySchoolidRequest($schoolId, $filter));
    }

    public function getCustomFieldsBySchoolidAndCustomfieldid(string $schoolId, int $customFieldId): Response
    {
        return $this->connector->send(new GetCustomFieldsBySchoolidAndCustomfieldidRequest($schoolId, $customFieldId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchStudentCustomFields(string $schoolId, array $customFields): Response
    {
        return $this->connector->send(new PatchStudentCustomFieldsRequest($schoolId, $customFields));
    }

    public function updateCustomFieldValueBySchoolidAndCustomfieldid(
        string $schoolId,
        int $customFieldId,
        string $customFieldValue,
    ): Response {
        return $this->connector->send(new UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest($schoolId, $customFieldId, $customFieldValue));
    }
}
