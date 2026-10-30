<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\AbsenceForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an absence.
 *
 * POST /api/humanresources/employees/{employeeId}/absences
 */
class CreateEmployeeAbsenceRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceForCreate|array<string, mixed>  $absence
     */
    public function __construct(
        protected int $employeeId,
        protected AbsenceForCreate|array $absence,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/absences';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->absence instanceof Data ? $this->absence->toArray() : $this->absence;
    }
}
