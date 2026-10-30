<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\DateRanges;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\StudentRegisters\DateRangeForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a date range for a student on a register with ranges.
 *
 * PUT /api/registers/{registerId}/students/{schoolId}/dateranges/{dateRangeId}
 */
class UpdateDateRangeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\StudentRegisters\DateRangeForUpdate|array<string, mixed>  $dateRange
     */
    public function __construct(
        protected int $registerId,
        protected string $schoolId,
        protected int $dateRangeId,
        protected DateRangeForUpdate|array $dateRange,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/dateranges/'.rawurlencode((string) $this->dateRangeId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->dateRange instanceof Data ? $this->dateRange->toArray() : $this->dateRange;
    }
}
