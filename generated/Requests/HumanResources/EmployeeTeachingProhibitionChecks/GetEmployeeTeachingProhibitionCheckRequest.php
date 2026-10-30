<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeTeachingProhibitionChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeTeachingProhibitionCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the teaching prohibition check for an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/teachingprohibitioncheck
 */
class GetEmployeeTeachingProhibitionCheckRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = EmployeeTeachingProhibitionCheck::class;

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/teachingprohibitioncheck';
    }
}
