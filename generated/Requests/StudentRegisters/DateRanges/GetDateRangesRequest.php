<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\DateRanges;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Data\StudentRegisters\StudentDateRanges;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the date ranges for all students on a register with ranges.
 *
 * GET /api/registers/{registerId}/students/dateranges
 */
class GetDateRangesRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentDateRanges::class;
    public string $resultKey = 'students';

    public function __construct(
        protected int $registerId,
        protected ?string $systemStatus = null,
        protected ?int $page = null,
        protected ?int $pageSize = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/dateranges';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'systemStatus' => $this->systemStatus,
            'page' => $this->page,
            'pageSize' => $this->pageSize,
        ], fn (mixed $value) => $value !== null);
    }
}
