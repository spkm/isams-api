<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Alumni;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\Alumni;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an alumnus/alumna.
 *
 * GET /api/alumni/{schoolId}
 */
class GetAlumniBySchoolIdRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Alumni::class;

    public function __construct(
        protected string $schoolId,
        protected ?string $expand = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/alumni/'.rawurlencode((string) $this->schoolId);
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
