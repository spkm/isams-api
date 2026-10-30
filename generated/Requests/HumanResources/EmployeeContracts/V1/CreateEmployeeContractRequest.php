<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V1;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeContractForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a contract for an employee.
 *
 * POST /api/humanresources/employees/{employeeId}/contracts
 */
class CreateEmployeeContractRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeContractForCreate|array<string, mixed>  $employeeContract
     */
    public function __construct(
        protected int $employeeId,
        protected EmployeeContractForCreate|array $employeeContract,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/contracts';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeContract instanceof Data ? $this->employeeContract->toArray() : $this->employeeContract;
    }
}
