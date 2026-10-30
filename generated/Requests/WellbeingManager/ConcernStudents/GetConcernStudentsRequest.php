<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernStudents;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernStudentSummary;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all students associated with a concern.
 *
 * GET /api/wellbeing/students/{schoolId}/concerns/{concernId}/students
 */
class GetConcernStudentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConcernStudentSummary::class;
    public string $resultKey = 'students';

    public function __construct(
        protected int $concernId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/students';
    }
}
