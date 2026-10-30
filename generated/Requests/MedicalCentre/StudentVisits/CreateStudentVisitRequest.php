<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentVisits;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\VisitForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a medical visit for a student.
 *
 * POST /api/medical/students/{schoolId}/visits
 */
class CreateStudentVisitRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\VisitForCreate|array<string, mixed>  $visit
     */
    public function __construct(
        protected string $schoolId,
        protected VisitForCreate|array $visit,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/visits';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->visit instanceof Data ? $this->visit->toArray() : $this->visit;
    }
}
