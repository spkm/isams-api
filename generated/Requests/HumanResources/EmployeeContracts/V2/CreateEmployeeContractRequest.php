<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V2;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\ContractForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a contract for an employee.
 *
 * POST /api/humanresources/employees/{employeeId}/contracts
 */
#[Beta]
class CreateEmployeeContractRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;
    protected ?string $apiVersion = '2.0';

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\ContractForCreate|array<string, mixed>  $command
     */
    public function __construct(
        protected int $employeeId,
        protected ContractForCreate|array $command,
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
        return $this->command instanceof Data ? $this->command->toArray() : $this->command;
    }
}
