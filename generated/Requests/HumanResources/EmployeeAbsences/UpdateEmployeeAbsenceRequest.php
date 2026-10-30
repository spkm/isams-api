<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeAbsences;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\AbsenceForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates an absence.
 *
 * PUT /api/humanresources/employees/{employeeId}/absences/{id}
 */
class UpdateEmployeeAbsenceRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceForUpdate|array<string, mixed>  $absence
     */
    public function __construct(
        protected int $employeeId,
        protected int $id,
        protected AbsenceForUpdate|array $absence,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/absences/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->absence instanceof Data ? $this->absence->toArray() : $this->absence;
    }
}
