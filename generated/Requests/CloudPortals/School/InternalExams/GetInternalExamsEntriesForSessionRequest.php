<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\InternalExams;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\InternalExamEntry;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/exams/internal/sessions/{sessionId}/entries
 */
class GetInternalExamsEntriesForSessionRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = InternalExamEntry::class;
    public string $resultKey = 'examEntries';

    public function __construct(
        protected string $schoolId,
        protected int $sessionId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/exams/internal/sessions/'.rawurlencode((string) $this->sessionId).'/entries';
    }
}
