<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a reference check.
 *
 * POST /api/humanresources/employees/{employeeId}/referencechecks
 */
class CreateEmployeeReferenceCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForCreate|array<string, mixed>  $employeeReferenceCheck
     */
    public function __construct(
        protected int $employeeId,
        protected EmployeeReferenceCheckForCreate|array $employeeReferenceCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/referencechecks';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeReferenceCheck instanceof Data ? $this->employeeReferenceCheck->toArray() : $this->employeeReferenceCheck;
    }
}
