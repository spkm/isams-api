<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeContracts;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\HumanResources\Contract;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a contract associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/contracts/{contractId}
 */
#[Beta]
class GetEmployeeContractRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Contract::class;
    protected ?string $apiVersion = '2.0';

    public function __construct(
        protected int $employeeId,
        protected int $contractId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/contracts/'.rawurlencode((string) $this->contractId);
    }
}
