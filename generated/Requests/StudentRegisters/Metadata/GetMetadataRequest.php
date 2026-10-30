<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\Metadata;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\StudentRegisters\MetadataField;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves metadata for a register.
 *
 * GET /api/registers/{registerId}/metadata
 */
class GetMetadataRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MetadataField::class;
    public string $resultKey = 'fields';
    protected bool $cacheable = true;

    public function __construct(
        protected int $registerId,
        protected ?string $expand = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/metadata';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'expand' => $this->expand,
        ], fn (mixed $value) => $value !== null);
    }
}
