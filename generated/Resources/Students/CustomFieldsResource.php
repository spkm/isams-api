<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Students\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Students\CustomFields\GetStudentCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\GetStudentCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\PatchStudentCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\PatchStudentCustomFieldsRequest;

class CustomFieldsResource extends BaseResource
{
    public function all(string $schoolId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetStudentCustomFieldsRequest($schoolId, $filter));
    }

    public function get(string $schoolId, int $customFieldId): Response
    {
        return $this->connector->send(new GetStudentCustomFieldRequest($schoolId, $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>  $customField
     */
    public function patch(string $schoolId, int $customFieldId, CustomFieldForPatch|array $customField): Response
    {
        return $this->connector->send(new PatchStudentCustomFieldRequest($schoolId, $customFieldId, $customField));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchMany(string $schoolId, array $customFields): Response
    {
        return $this->connector->send(new PatchStudentCustomFieldsRequest($schoolId, $customFields));
    }
}
