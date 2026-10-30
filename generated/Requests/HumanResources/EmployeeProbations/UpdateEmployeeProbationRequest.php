<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeProbations;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeProbationForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates the probation information for an employee.
 *
 * PUT /api/humanresources/employees/{employeeId}/probation
 */
class UpdateEmployeeProbationRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeProbationForUpdate|array<string, mixed>  $employeeProbation
     */
    public function __construct(
        protected int $employeeId,
        protected EmployeeProbationForUpdate|array $employeeProbation,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/probation';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeProbation instanceof Data ? $this->employeeProbation->toArray() : $this->employeeProbation;
    }
}
