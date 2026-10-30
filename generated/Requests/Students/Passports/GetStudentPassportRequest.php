<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Passports;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\StudentPassport;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves passport.
 *
 * GET /api/students/{schoolId}/passports/{id}
 */
class GetStudentPassportRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = StudentPassport::class;

    public function __construct(
        protected string $schoolId,
        protected int $id,
        protected ?string $expand = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/passports/'.rawurlencode((string) $this->id);
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
