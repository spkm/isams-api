<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentConditions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\ConditionForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a medical condition for a student.
 *
 * POST /api/medical/students/{schoolId}/conditions
 */
class CreateStudentConditionRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\ConditionForCreate|array<string, mixed>  $condition
     */
    public function __construct(
        protected string $schoolId,
        protected ConditionForCreate|array $condition,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/conditions';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->condition instanceof Data ? $this->condition->toArray() : $this->condition;
    }
}
