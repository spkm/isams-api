<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Students\CustomFieldForPatch;
use spkm\IsamsApi\Requests\Students\AlumniCustomFields\GetAlumniCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\AlumniCustomFields\GetAlumniCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\AlumniCustomFields\PatchAlumniCustomFieldRequest;
use spkm\IsamsApi\Requests\Students\AlumniCustomFields\PatchAlumniCustomFieldsRequest;

class AlumniCustomFieldsResource extends BaseResource
{
    public function getAlumniCustomField(string $schoolId, int $customFieldId): Response
    {
        return $this->connector->send(new GetAlumniCustomFieldRequest($schoolId, $customFieldId));
    }

    public function getAlumniCustomFields(string $schoolId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetAlumniCustomFieldsRequest($schoolId, $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>  $customField
     */
    public function patchAlumniCustomField(
        string $schoolId,
        int $customFieldId,
        CustomFieldForPatch|array $customField,
    ): Response {
        return $this->connector->send(new PatchAlumniCustomFieldRequest($schoolId, $customFieldId, $customField));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchAlumniCustomFields(string $schoolId, array $customFields): Response
    {
        return $this->connector->send(new PatchAlumniCustomFieldsRequest($schoolId, $customFields));
    }
}
