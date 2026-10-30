<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Employees;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\Employee;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an employee by user code.
 *
 * GET /api/humanresources/employees/{userCode}
 */
class GetEmployeeByUserCodeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Employee::class;

    public function __construct(
        protected string $userCode,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->userCode);
    }
}
