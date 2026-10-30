<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeFinancialInformation;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeFinancialInformationForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates the financial information for an employee.
 *
 * PUT /api/humanresources/employees/{employeeId}/financialinformation
 */
class UpdateEmployeeFinancialInformationRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeFinancialInformationForUpdate|array<string, mixed>  $employeeFinancialInformation
     */
    public function __construct(
        protected int $employeeId,
        protected EmployeeFinancialInformationForUpdate|array $employeeFinancialInformation,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/financialinformation';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeFinancialInformation instanceof Data ? $this->employeeFinancialInformation->toArray() : $this->employeeFinancialInformation;
    }
}
