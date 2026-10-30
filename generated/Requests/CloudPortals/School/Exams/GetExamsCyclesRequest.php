<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\Exams;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\ExamCycle;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/exams/cycles
 */
class GetExamsCyclesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ExamCycle::class;
    public string $resultKey = 'examCycles';

    public function resolveEndpoint(): string
    {
        return '/api/portals/exams/cycles';
    }
}
