<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeReferenceChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a reference check.
 *
 * PUT /api/humanresources/employees/{employeeId}/referencechecks/{referenceCheckId}
 */
class UpdateEmployeeReferenceCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\EmployeeReferenceCheckForUpdate|array<string, mixed>  $employeeReferenceCheck
     */
    public function __construct(
        protected int $employeeId,
        protected int $referenceCheckId,
        protected EmployeeReferenceCheckForUpdate|array $employeeReferenceCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/referencechecks/'.rawurlencode((string) $this->referenceCheckId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->employeeReferenceCheck instanceof Data ? $this->employeeReferenceCheck->toArray() : $this->employeeReferenceCheck;
    }
}
