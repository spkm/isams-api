<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentConditions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Archives a medical condition for a student.
 *
 * POST /api/medical/students/{schoolId}/conditions/{conditionId}/commands/archive
 */
class ArchiveStudentConditionRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected string $schoolId,
        protected string $conditionId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/conditions/'.rawurlencode((string) $this->conditionId).'/commands/archive';
    }
}
