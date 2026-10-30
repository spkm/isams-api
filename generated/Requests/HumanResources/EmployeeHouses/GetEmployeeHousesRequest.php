<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeHouses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeHouses;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all houses associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/houses
 */
class GetEmployeeHousesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = EmployeeHouses::class;

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/houses';
    }
}
