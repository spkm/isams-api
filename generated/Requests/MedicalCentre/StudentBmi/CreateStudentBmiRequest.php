<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentBmi;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\BmiForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a medical bmi for a student.
 *
 * POST /api/medical/students/{schoolId}/bmi
 */
class CreateStudentBmiRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\BmiForCreate|array<string, mixed>  $bmi
     */
    public function __construct(
        protected string $schoolId,
        protected BmiForCreate|array $bmi,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/bmi';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->bmi instanceof Data ? $this->bmi->toArray() : $this->bmi;
    }
}
