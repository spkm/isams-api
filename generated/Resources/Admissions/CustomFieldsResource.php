<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Admissions\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Admissions\CustomFields\GetApplicantCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\CustomFields\GetApplicantCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\CustomFields\PatchApplicantCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\CustomFields\PatchApplicantCustomFieldsRequest;

class CustomFieldsResource extends BaseResource
{
    public function all(string $schoolId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetApplicantCustomFieldsRequest($schoolId, $filter));
    }

    public function get(string $schoolId, int $customFieldId): Response
    {
        return $this->connector->send(new GetApplicantCustomFieldRequest($schoolId, $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>  $customField
     */
    public function patch(string $schoolId, int $customFieldId, CustomFieldForPatch|array $customField): Response
    {
        return $this->connector->send(new PatchApplicantCustomFieldRequest($schoolId, $customFieldId, $customField));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchMany(string $schoolId, array $customFields): Response
    {
        return $this->connector->send(new PatchApplicantCustomFieldsRequest($schoolId, $customFields));
    }
}
