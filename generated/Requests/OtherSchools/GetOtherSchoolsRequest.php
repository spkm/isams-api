<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\OtherSchools;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Data\OtherSchools\OtherSchool;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all schools.
 *
 * GET /api/otherschools
 */
class GetOtherSchoolsRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = OtherSchool::class;
    public string $resultKey = 'otherSchools';
    protected bool $cacheable = true;

    public function __construct(
        protected ?int $page = null,
        protected ?int $pageSize = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/otherschools';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'pageSize' => $this->pageSize,
        ], fn (mixed $value) => $value !== null);
    }
}
