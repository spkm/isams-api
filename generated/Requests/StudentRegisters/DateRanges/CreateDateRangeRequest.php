<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\DateRanges;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\StudentRegisters\DateRangeForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Adds a date range for a student on a register with ranges.
 *
 * POST /api/registers/{registerId}/students/{schoolId}/dateranges
 */
class CreateDateRangeRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\StudentRegisters\DateRangeForCreate|array<string, mixed>  $dateRange
     */
    public function __construct(
        protected int $registerId,
        protected string $schoolId,
        protected DateRangeForCreate|array $dateRange,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/dateranges';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->dateRange instanceof Data ? $this->dateRange->toArray() : $this->dateRange;
    }
}
