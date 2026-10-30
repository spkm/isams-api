<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\Divisions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\Division;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all divisions.
 *
 * GET /api/school/divisions
 */
class GetDivisionsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Division::class;
    public string $resultKey = 'divisions';
    protected bool $cacheable = true;

    public function __construct(
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/divisions';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
