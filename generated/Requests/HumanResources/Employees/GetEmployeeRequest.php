<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Employees;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\Employee;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an employee by ID.
 *
 * GET /api/humanresources/employees/{id}
 */
class GetEmployeeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Employee::class;

    public function __construct(
        protected int $id,
        protected ?string $expand = null,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'expand' => $this->expand,
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
