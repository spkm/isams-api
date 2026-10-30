<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeContractForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a contract for an employee.
 *
 * PUT /api/humanresources/employees/{employeeId}/contracts/{contractId}
 */
class UpdateEmployeeContractRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeContractForUpdate|array<string, mixed>  $employeeContract
     */
    public function __construct(
        protected int $employeeId,
        protected int $contractId,
        protected EmployeeContractForUpdate|array $employeeContract,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/contracts/'.rawurlencode((string) $this->contractId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeContract instanceof Data ? $this->employeeContract->toArray() : $this->employeeContract;
    }
}
