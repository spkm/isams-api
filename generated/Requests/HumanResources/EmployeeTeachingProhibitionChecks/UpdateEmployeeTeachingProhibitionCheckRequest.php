<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeTeachingProhibitionChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeTeachingProhibitionCheckForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates the teaching prohibition check for an employee.
 *
 * PUT /api/humanresources/employees/{employeeId}/teachingprohibitioncheck
 */
class UpdateEmployeeTeachingProhibitionCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeTeachingProhibitionCheckForUpdate|array<string, mixed>  $employeeTeachingProhibitionCheck
     */
    public function __construct(
        protected int $employeeId,
        protected EmployeeTeachingProhibitionCheckForUpdate|array $employeeTeachingProhibitionCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/teachingprohibitioncheck';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeTeachingProhibitionCheck instanceof Data ? $this->employeeTeachingProhibitionCheck->toArray() : $this->employeeTeachingProhibitionCheck;
    }
}
