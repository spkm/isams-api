<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeRightToWorkCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all right to work checks associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/righttoworkchecks
 */
class GetEmployeeRightToWorkChecksRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = EmployeeRightToWorkCheck::class;
    public string $resultKey = 'rightToWorkChecks';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/righttoworkchecks';
    }
}
