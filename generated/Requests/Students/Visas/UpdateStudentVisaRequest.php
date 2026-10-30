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
use spkm\IsamsApi\Data\Students\StudentVisaForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a student visa.
 *
 * PUT /api/students/{schoolId}/visas/{id}
 */
#[Beta]
class UpdateStudentVisaRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaForUpdate|array<string, mixed>  $studentVisa
     */
    public function __construct(
        protected string $schoolId,
        protected int $id,
        protected StudentVisaForUpdate|array $studentVisa,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/'.rawurlencode((string) $this->schoolId).'/visas/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->studentVisa instanceof Data ? $this->studentVisa->toArray() : $this->studentVisa;
    }
}
