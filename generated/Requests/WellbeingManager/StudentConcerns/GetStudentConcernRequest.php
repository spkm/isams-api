<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\Concern;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a concern.
 *
 * GET /api/wellbeing/students/{schoolId}/concerns/{id}
 */
class GetStudentConcernRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Concern::class;

    public function __construct(
        protected string $schoolId,
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->id);
    }
}
