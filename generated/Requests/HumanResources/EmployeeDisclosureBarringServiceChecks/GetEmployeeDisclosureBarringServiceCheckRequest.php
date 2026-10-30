<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheck;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the disclosure barring service check associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/disclosurebarringservicecheck
 */
class GetEmployeeDisclosureBarringServiceCheckRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = DisclosureBarringServiceCheck::class;

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/disclosurebarringservicecheck';
    }
}
