<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeContract;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all contracts associated with an employee, including archived contracts.
 *
 * GET /api/humanresources/employees/{employeeId}/contracts
 */
class GetEmployeeContractsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = EmployeeContract::class;
    public string $resultKey = 'contracts';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/contracts';
    }
}
