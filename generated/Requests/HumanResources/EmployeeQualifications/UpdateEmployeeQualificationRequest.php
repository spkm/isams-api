<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\QualificationForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a qualification for an employee.
 *
 * PUT /api/humanresources/employees/{employeeId}/qualifications/{qualificationId}
 */
class UpdateEmployeeQualificationRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\QualificationForUpdate|array<string, mixed>  $qualification
     */
    public function __construct(
        protected int $employeeId,
        protected int $qualificationId,
        protected QualificationForUpdate|array $qualification,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/qualifications/'.rawurlencode((string) $this->qualificationId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->qualification instanceof Data ? $this->qualification->toArray() : $this->qualification;
    }
}
