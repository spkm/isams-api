<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Visas;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Students\StudentVisa;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all visas associated with a student.
 *
 * GET /api/students/{schoolId}/visas
 */
#[Beta]
class GetStudentVisasRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentVisa::class;
    public string $resultKey = 'visas';

    public function __construct(
        protected string $schoolId,
        protected ?string $expand = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/visas';
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
