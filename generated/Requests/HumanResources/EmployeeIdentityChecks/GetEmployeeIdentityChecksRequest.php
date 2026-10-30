<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeIdentityChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeIdentityCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all identity checks associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/identitychecks
 */
class GetEmployeeIdentityChecksRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = EmployeeIdentityCheck::class;
    public string $resultKey = 'identityChecks';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/identitychecks';
    }
}
