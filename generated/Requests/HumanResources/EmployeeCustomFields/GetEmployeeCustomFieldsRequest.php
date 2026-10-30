<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeCustomFields;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\CustomField;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all custom fields associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/customFields
 */
class GetEmployeeCustomFieldsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = CustomField::class;
    public string $resultKey = 'customFields';

    public function __construct(
        protected int $employeeId,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/customFields';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
