<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\Visas;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates student visas.
 *
 * PUT /api/students/{schoolId}/visas
 */
#[Beta]
class UpdateStudentVisasRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  array<int, \spkm\IsamsApi\Data\Students\StudentVisaForUpdate|array<string, mixed>>  $studentVisas
     */
    public function __construct(
        protected string $schoolId,
        protected array $studentVisas,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/visas';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return array_values(array_map(fn (mixed $item) => $item instanceof Data ? $item->toArray() : $item, $this->studentVisas));
    }
}
