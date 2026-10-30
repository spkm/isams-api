<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeFinancialInformation;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeFinancialInformation;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the financial information for an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/financialinformation
 */
class GetEmployeeFinancialInformationRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = EmployeeFinancialInformation::class;

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/financialinformation';
    }
}
