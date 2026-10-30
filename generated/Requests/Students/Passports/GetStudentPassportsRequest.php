<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Passports;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\StudentPassport;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all passports associated with a student.
 *
 * GET /api/students/{schoolId}/passports
 */
class GetStudentPassportsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentPassport::class;
    public string $resultKey = 'passports';

    public function __construct(
        protected string $schoolId,
        protected ?string $expand = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/passports';
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
