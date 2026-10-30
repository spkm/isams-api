<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Discipline\DetentionSessions;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Discipline\DetentionSession;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all detention sessions. Results can be filtered using OData query options.
 *
 * GET /api/discipline/detention/sessions
 */
#[Beta]
class GetDetentionSessionsRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = DetentionSession::class;
    public string $resultKey = 'detentionSessions';

    public function __construct(
        protected ?int $page = null,
        protected ?int $pageSize = null,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/discipline/detention/sessions';
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
