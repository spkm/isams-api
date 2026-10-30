<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\InternalExams;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\InternalExamResult;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/exams/internal/sessions/{sessionId}/results
 */
class GetInternalExamsResultsForSessionRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = InternalExamResult::class;
    public string $resultKey = 'examResults';

    public function __construct(
        protected string $schoolId,
        protected int $sessionId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/exams/internal/sessions/'.rawurlencode((string) $this->sessionId).'/results';
    }
}
