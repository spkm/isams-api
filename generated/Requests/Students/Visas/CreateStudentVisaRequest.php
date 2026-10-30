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
use spkm\IsamsApi\Data\Students\StudentVisaForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a student visa.
 *
 * POST /api/students/{schoolId}/visas
 */
#[Beta]
class CreateStudentVisaRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaForCreate|array<string, mixed>  $studentVisa
     */
    public function __construct(
        protected string $schoolId,
        protected StudentVisaForCreate|array $studentVisa,
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
        return $this->studentVisa instanceof Data ? $this->studentVisa->toArray() : $this->studentVisa;
    }
}
