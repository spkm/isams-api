<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Exams;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\ExamEntry;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/exams/cycles/{cycleId}/entries
 */
class GetExamsEntriesForCycleRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ExamEntry::class;
    public string $resultKey = 'examEntries';

    public function __construct(
        protected string $schoolId,
        protected int $cycleId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/exams/cycles/'.rawurlencode((string) $this->cycleId).'/entries';
    }
}
