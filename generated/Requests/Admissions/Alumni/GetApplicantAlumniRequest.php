<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Alumni;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Data\Admissions\Alumni;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all alumni.
 *
 * GET /api/admissions/applicants/alumni
 */
class GetApplicantAlumniRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Alumni::class;
    public string $resultKey = 'alumni';

    public function __construct(
        protected ?int $page = null,
        protected ?int $pageSize = null,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/alumni';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'pageSize' => $this->pageSize,
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
