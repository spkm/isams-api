<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\HumanResources\CustomFieldForPatch;
use spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\GetEmployeeCustomFieldRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\GetEmployeeCustomFieldsRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\PatchEmployeeCustomFieldRequest;
use spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\PatchEmployeeCustomFieldsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EmployeeCustomFieldsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\CustomField>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\GetEmployeeCustomFieldsRequest
     */
    public function all(int $employeeId, string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetEmployeeCustomFieldsRequest(employeeId: $employeeId, filter: $filter));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\CustomField>
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\GetEmployeeCustomFieldRequest
     */
    public function get(int $employeeId, int $customFieldId): Collection
    {
        return $this->fetch(new GetEmployeeCustomFieldRequest(employeeId: $employeeId, customFieldId: $customFieldId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\CustomFieldForPatch|array<string, mixed>  $customField
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\PatchEmployeeCustomFieldRequest
     */
    public function patch(int $employeeId, int $customFieldId, CustomFieldForPatch|array $customField): bool
    {
        $this->fetch(new PatchEmployeeCustomFieldRequest(employeeId: $employeeId, customFieldId: $customFieldId, customField: $customField));

        return true;
    }

    /**
     * @param  array<int, \spkm\IsamsApi\Data\HumanResources\CustomFieldForPatch|array<string, mixed>>  $customFields
     * @see \spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields\PatchEmployeeCustomFieldsRequest
     */
    public function patchMany(int $employeeId, array $customFields): bool
    {
        $this->fetch(new PatchEmployeeCustomFieldsRequest(employeeId: $employeeId, customFields: $customFields));

        return true;
    }
}
