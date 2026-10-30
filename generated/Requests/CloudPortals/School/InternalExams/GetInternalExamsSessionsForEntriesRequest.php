<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\InternalExams;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\InternalExamSession;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/exams/internal/sessions/{schoolId}/entries
 */
class GetInternalExamsSessionsForEntriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = InternalExamSession::class;
    public string $resultKey = 'examSessions';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/exams/internal/sessions/'.rawurlencode((string) $this->schoolId).'/entries';
    }
}
