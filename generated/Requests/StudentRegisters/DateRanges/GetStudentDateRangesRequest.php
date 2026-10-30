<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\DateRanges;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\StudentRegisters\DateRange;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the date ranges for a student on a register with ranges.
 *
 * GET /api/registers/{registerId}/students/{schoolId}/dateranges
 */
class GetStudentDateRangesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = DateRange::class;
    public string $resultKey = 'dateRanges';

    public function __construct(
        protected int $registerId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/dateranges';
    }
}
