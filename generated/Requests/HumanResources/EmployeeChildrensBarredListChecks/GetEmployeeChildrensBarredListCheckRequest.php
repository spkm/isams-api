<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the children's barred list check associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/childrensbarredlistcheck
 */
class GetEmployeeChildrensBarredListCheckRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ChildrensBarredListCheck::class;

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/childrensbarredlistcheck';
    }
}
