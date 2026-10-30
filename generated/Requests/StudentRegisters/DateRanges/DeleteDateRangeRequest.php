<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\DateRanges;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes a date range for a student on a register with ranges.
 *
 * DELETE /api/registers/{registerId}/students/{schoolId}/dateranges/{dateRangeId}
 */
class DeleteDateRangeRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $registerId,
        protected string $schoolId,
        protected int $dateRangeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/dateranges/'.rawurlencode((string) $this->dateRangeId);
    }
}
