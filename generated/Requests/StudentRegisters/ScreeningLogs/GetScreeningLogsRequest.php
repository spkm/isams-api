<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\ScreeningLogs;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\StudentRegisters\StudentScreeningLog;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves screening logs for a register and a student
 *
 * GET /api/registers/{registerId}/students/{schoolId}/screeninglogs
 */
class GetScreeningLogsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentScreeningLog::class;
    public string $resultKey = 'logs';

    public function __construct(
        protected int $registerId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/screeninglogs';
    }
}
