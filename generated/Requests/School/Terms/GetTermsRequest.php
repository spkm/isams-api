<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\Terms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\Term;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all terms.
 *
 * GET /api/school/terms
 */
class GetTermsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Term::class;
    public string $resultKey = 'terms';
    protected bool $cacheable = true;

    public function __construct(
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/terms';
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
