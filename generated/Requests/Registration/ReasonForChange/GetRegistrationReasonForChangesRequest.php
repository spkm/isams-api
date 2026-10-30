<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Registration\ReasonForChange;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Registration\AttendanceCodeReasonForChange;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Get all registration changes for a given date range with the provided reason for the change.
 *
 * GET /api/registration/codechanges
 */
#[Beta]
class GetRegistrationReasonForChangesRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = AttendanceCodeReasonForChange::class;
    public string $resultKey = 'attendanceCodeReasonForChanges';

    public function __construct(
        protected \DateTimeInterface|string|null $changeDateStart = null,
        protected \DateTimeInterface|string|null $changeDateEnd = null,
        protected ?int $page = null,
        protected ?int $pageSize = null,
        protected ?bool $onlyEmptyReasons = null,
        protected ?bool $oldestFirst = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registration/codechanges';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'changeDateStart' => $this->changeDateStart instanceof \DateTimeInterface ? $this->changeDateStart->format('Y-m-d\TH:i:s') : $this->changeDateStart,
            'changeDateEnd' => $this->changeDateEnd instanceof \DateTimeInterface ? $this->changeDateEnd->format('Y-m-d\TH:i:s') : $this->changeDateEnd,
            'page' => $this->page,
            'pageSize' => $this->pageSize,
            'onlyEmptyReasons' => $this->onlyEmptyReasons === null ? null : ($this->onlyEmptyReasons ? 'true' : 'false'),
            'oldestFirst' => $this->oldestFirst === null ? null : ($this->oldestFirst ? 'true' : 'false'),
        ], fn (mixed $value) => $value !== null);
    }
}
