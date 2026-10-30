<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Bulletin\DailyBulletin;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Data\Bulletin\Bulletin;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/dailybulletins/year
 */
class GetPortalDailyBulletinsByYearRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Bulletin::class;
    public string $resultKey = 'bulletins';

    public function __construct(
        protected \DateTimeInterface|string $date,
        protected ?string $yearGroups = null,
        protected ?int $page = null,
        protected ?int $pageSize = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/dailybulletins/year';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'date' => $this->date instanceof \DateTimeInterface ? $this->date->format('Y-m-d\TH:i:s') : $this->date,
            'yearGroups' => $this->yearGroups,
            'page' => $this->page,
            'pageSize' => $this->pageSize,
        ], fn (mixed $value) => $value !== null);
    }
}
