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
 * Retrieves all contracts associated with an employee, including archived contracts.
 *
 * GET /api/humanresources/employees/{employeeId}/contracts
 */
#[Beta]
class GetEmployeeContractsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Contract::class;
    public string $resultKey = 'contracts';
    protected ?string $apiVersion = '2.0';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/contracts';
    }
}
