<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\HumanResources\CustomFieldForPatch;
use spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\GetEmployeeCustomFieldRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\GetEmployeeCustomFieldsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\PatchEmployeeCustomFieldRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\PatchEmployeeCustomFieldsRequest;

class EmployeeCustomFieldsResource extends BaseResource
{
    public function all(int $employeeId, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetEmployeeCustomFieldsRequest($employeeId, $filter));
    }

    public function get(int $employeeId, int $customFieldId): Response
    {
        return $this->connector->send(new GetEmployeeCustomFieldRequest($employeeId, $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\CustomFieldForPatch|array<string, mixed>  $customField
     */
    public function patch(int $employeeId, int $customFieldId, CustomFieldForPatch|array $customField): Response
    {
        return $this->connector->send(new PatchEmployeeCustomFieldRequest($employeeId, $customFieldId, $customField));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\HumanResources\CustomFieldForPatch|array<string, mixed>>  $customFields
     */
    public function patchMany(int $employeeId, array $customFields): Response
    {
        return $this->connector->send(new PatchEmployeeCustomFieldsRequest($employeeId, $customFields));
    }
}
