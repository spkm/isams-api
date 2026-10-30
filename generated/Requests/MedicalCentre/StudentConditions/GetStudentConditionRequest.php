<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentConditions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Condition;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a medical condition for a student.
 *
 * GET /api/medical/students/{schoolId}/conditions/{conditionId}
 */
class GetStudentConditionRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Condition::class;

    public function __construct(
        protected string $schoolId,
        protected string $conditionId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/conditions/'.rawurlencode((string) $this->conditionId);
    }
}
