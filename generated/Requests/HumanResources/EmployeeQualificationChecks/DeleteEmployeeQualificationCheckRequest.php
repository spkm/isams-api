<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeQualificationChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a qualification check.
 *
 * DELETE /api/humanresources/employees/{employeeId}/qualificationchecks/{qualificationCheckId}
 */
class DeleteEmployeeQualificationCheckRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $employeeId,
        protected int $qualificationCheckId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/qualificationchecks/'.rawurlencode((string) $this->qualificationCheckId);
    }
}
