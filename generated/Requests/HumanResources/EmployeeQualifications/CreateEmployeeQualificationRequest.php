<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeQualifications;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\QualificationForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a qualification for an employee.
 *
 * POST /api/humanresources/employees/{employeeId}/qualifications
 */
class CreateEmployeeQualificationRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\QualificationForCreate|array<string, mixed>  $qualification
     */
    public function __construct(
        protected int $employeeId,
        protected QualificationForCreate|array $qualification,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/qualifications';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->qualification instanceof Data ? $this->qualification->toArray() : $this->qualification;
    }
}
