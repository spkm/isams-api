<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\CustomFieldForPatch;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates the value of a custom field associated with an employee.
 *
 * PATCH /api/humanresources/employees/{employeeId}/customFields/{customFieldId}
 */
class PatchEmployeeCustomFieldRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\CustomFieldForPatch|array<string, mixed>  $customField
     */
    public function __construct(
        protected int $employeeId,
        protected int $customFieldId,
        protected CustomFieldForPatch|array $customField,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/customFields/'.rawurlencode((string) $this->customFieldId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->customField instanceof Data ? $this->customField->toArray() : $this->customField;
    }
}
