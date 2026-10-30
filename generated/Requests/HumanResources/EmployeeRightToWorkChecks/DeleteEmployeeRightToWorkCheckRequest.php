<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeRightToWorkChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a right to work check.
 *
 * DELETE /api/humanresources/employees/{employeeId}/righttoworkchecks/{rightToWorkCheckId}
 */
class DeleteEmployeeRightToWorkCheckRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $employeeId,
        protected int $rightToWorkCheckId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/righttoworkchecks/'.rawurlencode((string) $this->rightToWorkCheckId);
    }
}
